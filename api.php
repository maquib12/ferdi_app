tar)+(2*$two_star)+(1*$one_star))/$total_rating),1);
           
        }
        $course_data = Course::where('created_by',Auth::user()->id)->get();
         $average_star_rating = array();
        foreach($course_data as $key => $value){
                     $course_id = $value->id;
                     $total_course_rating = Courserating::where('course_id',$course_id)->count();
                    $five_rating = $four_rating = $three_rating = $two_rating = $one_rating = $avg = 0;
                    if($total_course_rating != 0){
                        $five_star = Courserating::where('course_id',$course_id)->where('rating',5)->count();

                        $four_star = Courserating::where('course_id',$course_id)->where('rating',4)->count();

                        $three_star = Courserating::where('course_id',$course_id)->where('rating',3)->count();
                        $two_star = Courserating::where('course_id',$course_id)->where('rating',2)->count();
                        $one_star = Courserating::where('course_id',$course_id)->where('rating',1)->count();
                        $five_rating = round(($five_star/$total_course_rating)*100);
                        $four_rating = round(($four_star/$total_course_rating)*100);
                        $three_rating = round(($three_star/$total_course_rating)*100);

                        $two_rating = round(($two_star/$total_course_rating)*100);
                        $one_rating = round(($one_star/$total_course_rating)*100);
                 
                        $avg = round((((5*$five_star)+(4*$four_star)+(3*$three_star)+(2*$two_star)+(1*$one_star))/$total_course_rating),1);
                        
                    }
                    $average_star_rating[$course_id] = $avg;   
            }

        $countries = Country::all();
        $business = Business::all();
        $course_count = 0;
        if($courses != null){
            $course_count = count($courses);
        }
        $fans = Fan::where('facilitator_id',Auth::user()->id)->where('status',1)->count();
        $process_courses = Course::where('created_by',Auth::user()->id)->where('status',0)->get();
        $process_count = Course::where('created_by',Auth::user()->id)->where('status',0)->count();
        $not_approved_courses = Course::where('created_by',Auth::user()->id)->where('status',2)->get();
        $not_approved_count = Course::where('created_by',Auth::user()->id)->where('status',2)->count();
        return view('facilitator.my_profile_new',compact('process_courses','process_count','not_approved_courses','not_approved_count','fans','avg_star_rating','average_star_rating',$average_star_rating))->with('message',$message)->with('user',$user[0])->with('courses',$courses)->with('course_count',$course_count)->with('countries',$countries)->with('business',$business);
    }
    public function getCity($id){
        $cities = City::where('country_id',$id)->pluck("name","id");
        return json_encode($cities);
    }
    public function getPhone($id){
        $phonecode = Country::where('id',$id)->pluck("phonecode");
        return $phonecode;
    }
    public function edit_my_profile(Request $request)
    {
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'country'=>'required',
            'city' => 'required',
            'license' => 'required',
            'phone_no'=>'required|min:8|max:12',
            'business_industry'=>'required',
            'profile_pic' => 'bail|mimes:jpeg,jpg,png,gif|max:10000',
            'id_proof' => 'bail|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        if ($validator->fails()) {
            Toastr::error("All fields are required..", $title = "Failed", ['timeOut' => 5000], ["positionClass" => "toast-top-center"]);
            return redirect()->back()->withErrors($validator);
        }else{
            try{
                $data = Userdetail::where('user_id',Auth::user()->id)->first();
                $profile_pic = $request->file('profile_pic');
                $id_proof = $request->file('id_proof');
                if(isset($request['gender'])) $gender=$request['gender']; else $gender=null;
                if(isset($request->profile_pic)){
                    $file = $request->file('profile_pic');
                    $profile_pic = time().$file->getClientOriginalName();
                    $request->profile_pic->move(public_path('profile_pic'), $profile_pic);
                }else{
                  $profile_pic = isset($data->image)? $data->image: null;  
                }
                if(isset($request->id_proof)){
                    $id_proof_file = $request->file('id_proof');
                    $id_proof = time().$id_proof_file->getClientOriginalName();
                    $request->id_proof->move(public_path('id_proof'), $id_proof);
                }else{
                   $id_proof = isset($data->image) ? $data->id_proof : null; 
                }
                if($request->file('profile_pic') == null && isset($request['images'])){
                    $profile_pic = $request['images'];
                }
                if($request->file('id_proof') == null && isset($request['id_proof_images'])){
                    $id_proof = $request['id_proof_images'];
                }
                User::updateOrCreate(
                    ['id' => Auth::user()->id],
                    ['name' => $request['name']]
                );
                Userdetail::updateOrCreate(
                    ['user_id' => Auth::user()->id],
                    [
                        'phone_no' => $request['phone_no'],
                        'image' => $profile_pic,
                        'country_id' => $request['country'],
                        'city_id' => $request['city'],
                        'license' => $request['license'],
                        'phone_code' => $request['phone_code'],
                        'business_industry' => $request['business_industry'],
                        'id_proof' => $id_proof
                    ]
                );

                Toastr::success("Complete Profile Successfull done.", $title = "Success", ['timeOut' => 5000], ["positionClass" => "toast-top-center"]);
                return redirect()->route('facilitator_complete_profile');

            }catch(Exception $e){
                Toastr::error($e->getMessage(), 'Failed', ['options']);
                Toastr::clear();
                return redirect()->back();

            }
        }

    }
    public function passwordChange(Request $request){
        $this->validate($request,[
         'current_password'=>'required',
         'password'=>'required'
        ]);
        $check = Hash::check($request['current_password'],Auth::user()->password);
        if($check == 'true'){
            User::where('id',Auth::user()->id)->update(['password' => Hash::make($request['password'])]);
            Toastr::success('Password Change Successfully ','Success');
            return redirect()->route('facilitator_complete_profile');
        }
        Toastr::error('Old Password is not matched.','Failed');
        return redirect()->back()->withErrors(['Old Password is not matched']);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function create_course()
    {
        $categories = Category::all();
        $languages = Language::all();
        return view('facilitator.create_course')->with('categories',$categories)->with('languages',$languages);
    }
    public function createCourse(Request $request){
        $user_status = User::where('id',Auth::user()->id)->where('status',1)->get()->toArray();
        if($user_status != null){
            $this->validate($request,[
                 'category'=>'required|integer',
                 'name'=>'required|unique:courses',
                 'language'=>'required|integer',
                 'price'=>'required|integer|gte:0',
                 'description'=>'required',
                 'no_of_modules'=>'required|integer',
                 'duration'=>'required',
                 'learning_objectives'=>'required|max:255|string',
                 'study_time'=>'required',
                 'rewards'=>'required|max:255|string',
                 'skills'=>'required|max:255|string',
                 'overview'=>'required',
                 'cover_pic' => 'bail|mimes:jpeg,jpg,png,gif,mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040',
            ],
            [
                'category.integer' => 'Application field is required',
                'name.required' => 'Course Title is required',
                'name.unique' => 'Course Title should be unique',
                'language.integer' => 'You have to chose a language',
                'description.required' => 'Course description is required',
                'no_of_modules.integer' => 'Total No. Of module should be a number',
                'duration.required' => 'Course Duration is required',
                'learning_objectives.required' => 'Learning Objectives is required',
                'study_time.required' => 'The expected study time and time spent for internship is required',
                'rewards.required' => 'The financial rewards at the end of Years 1,2 and 3 for each Course Description is required',
                'skills.required' => 'Skills are required',
                'overview.required' => 'Market overview of the course is required',
            ]);
            $cover_pic = $request->file('cover_pic');
            //mimeType
            if(isset($request->cover_pic)){
                $extension = $request->cover_pic->extension();
                if($extension == "mp4" || $extension == "3gp"){
                    $file = $request->file('cover_pic');
                    $extension =$file->getClientOriginalExtension();
                    $cover_pic = time().$file->getClientOriginalName();
                    $file_name= rand(111,99999).'.'.$extension;
                    $thumb_begin = (explode('.',$file_name)[0]).'.jpg';
                    $file->move(public_path('video'), $file_name);
                    $thumb = VideoThumbnail::createThumbnail(public_path('video/'.$file_name), public_path('cover_pic/'), $thumb_begin, 1,600,600);
                    $pdf_file = $request->file('pdf');
                    if(isset($request->pdf)){
                        $file = $request->file('pdf');
                        $pdf_file = time().$file->getClientOriginalName();
                        $request->pdf->move(public_path('pdf'), $pdf_file);
                    }
                    $duration_explode = explode(':', $request['duration']);
                    $duration = $duration_explode[0].'.'.$duration_explode[1];
                    Course::create([
                        "category_id" => $request['category'],
                        "name" => strtoupper($request['name']),
                        "language_id" => $request['language'],
                        "price" => $request['price'],
                        "description" => $request['description'],
                        "created_by" => Auth::user()->id,
                        "status" => 0,
                        "images" => $thumb_begin,
                        'videos' => $file_name,
                        "course_pdf" => $pdf_file,
                        "total_no_of_module" => $request['no_of_modules'],
                        "course_duration_in_hours" => (float)$duration,
                        "learning_objects" => strtoupper($request['learning_objectives']),
                        "time_spent_for_internship" => $request['study_time'],
                        "financial_rewards" => $request['rewards'],
                        "add_skills" => strtoupper($request['skills']),
                        "market_overview" => $request['overview'],
                    ]);
                    
                }else{
                  $file = $request->file('cover_pic');
                    $cover_pic = time().$file->getClientOriginalName();
                    $request->cover_pic->move(public_path('cover_pic'), $cover_pic); 
                    $pdf_file = $request->file('pdf');
                    if(isset($request->pdf)){
                        $file = $request->file('pdf');
                        $pdf_file = time().$file->getClientOriginalName();
                        $request->pdf->move(public_path('pdf'), $pdf_file);
                    }
                    $duration_explode = explode(':', $request['duration']);
                    $duration = $duration_explode[0].'.'.$duration_explode[1];
                    Course::create([
                        "category_id" => $request['category'],
                        "name" => strtoupper($request['name']),
                        "language_id" => $request['language'],
                        "price" => $request['price'],
                        "description" => $request['description'],
                        "created_by" => Auth::user()->id,
                        "status" => 0,
                        "images" => $cover_pic,
                        "course_pdf" => $pdf_file,
                        "total_no_of_module" => $request['no_of_modules'],
                        "course_duration_in_hours" => (float)$duration,
                        "learning_objects" => strtoupper($request['learning_objectives']),
                        "time_spent_for_internship" => $request['study_time'],
                        "financial_rewards" => $request['rewards'],
                        "add_skills" => strtoupper($request['skills']),
                        "market_overview" => $request['overview'],
                    ]); 
                }
                
            }
            
            $message = strtoupper($request['name'])." created";
            $categories = Category::all();
            $languages = Language::all();
            Toastr::success('Course is successfully added.','Success');
            return redirect()->route('facilitator_complete_profile');
            // return view('facilitator.create_course')->with('categories',$categories)->with('languages',$languages)->with('success_message',$message);
        }else{
            $categories = Category::all();
            $languages = Language::all();
            $message = "You don't have the permission to create a course. Wait untill Admin approve your request. Thank you.";
            return view('facilitator.create_course')->with('categories',$categories)->with('languages',$languages)->with('message',$message);
        }
    }
    public function course_details(Request $request){
        // dd("Tset");
        $course = Course::with('category')->with('language')->with('language')->find($request['id']);
        $learning_objects = explode(',',$course['learning_objects']);

        $courses = Course::where('id',$request['id'])->first();
        
       $total_rating = 0;
       $avg_star_rating = 0;
        
         $total_rating = Courserating::where('course_id',$courses->id)->count();
         $five_star_rating = $four_star_rating = $three_star_rating = $two_star_rating = $one_star_rating = $avg_star_rating = 0;
         if($total_rating != 0){
             $five_star = Courserating::where('course_id',$courses->id)->where('rating',5)->count();
             $four_star = Courserating::where('course_id',$courses->id)->where('rating',4)->count();
             $three_star = Courserating::where('course_id',$course->id)->where('rating',3)->count();
             $two_star = Courserating::where('course_id',$courses->id)->where('rating',2)->c