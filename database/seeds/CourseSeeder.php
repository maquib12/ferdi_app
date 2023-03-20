<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\User;
use Carbon\Carbon;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $courses = array(
            array('name' => 'Business Administration', 'category_id' => 1, 'language_id' => 1, 'price' => 100, 'description' => 'All about Business Administration', 'created_by' => 5, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('name' => 'Business Analysis', 'category_id' => 1, 'language_id' => 2, 'price' => 200, 'description' => 'All about Business Analysis', 'created_by' => 7, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('courses')->insert($courses);

        foreach (Course::all() as $course) {
            $users = User::all()->skip(25)->take(6)->pluck('id');
            $course->users()->attach($users);
        }
    }
}
