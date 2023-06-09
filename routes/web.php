<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// For Student section

Auth::routes(['verify' => true]);


Route::post('/registration', 'Auth\RegisterController@registration')->name('registration');
Route::post('/registration-sponsor', 'Auth\RegisterController@registrationSponsor')->name('registration-sponsor');
Route::post('/complete-profile-sponsor', 'Auth\RegisterController@completeProfileSponsor')->name('complete-profile-sponsor');
Route::get('/verify','Auth\RegisterController@verify')->name('verify');
Route::post('/resend-mail','Auth\RegisterController@resendMail')->name('resend-mail');
Route::get('/email-verify/{id}','Auth\RegisterController@emailVerify');
Route::get('/', 'Auth\RegisterController@home');
Route::get('/change', 'Auth\RegisterController@change')->name('changeLang');
Route::get('/refer', 'Auth\RegisterController@home');
Route::get('/addtocart/{id}', 'StudentController@addToCart')->name('addtocart');
Route::get('view_cart', 'StudentController@viewCart')->name('view_cart');
Route::get('/remove_from_cart/{id}', 'StudentController@removeFromCart');
Route::get('/remove_cart/{id}', 'StudentController@removeInCart');

Route::get('auth/facebook', 'Auth\RegisterController@redirectToFacebook')->name('auth.facebook');
Route::get('auth/facebook/callback', 'Auth\RegisterController@handleFacebookCallback');
Route::get('auth/google', 'Auth\RegisterController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\RegisterController@handleGoogleCallback');


Route::group(['namespace' => 'Auth\CommonAuth'], function () {
	Route::post('facilitatorLogin', 'LoginController@loginPost')->name('facilogin');
	Route::post('sponsor-login', 'LoginController@sponsorLogin')->name('sponsor-login');
    Route::get('faciLogout', 'LoginController@logout')->name('faciLogout');  
});

Route::group([ 'namespace' => 'Facilitator'], function () {
 	Route::post('facilitatorregister', 'RegisterController@register')->name('facilitatorregister');
});   

Route::group([ 'namespace' => 'Facilitator','middleware' =>'facilitatormodel'], function () {
 	Route::get('facidashboard', 'DashboardController@index')->name('faci.dashboard');
});

Route::get('/admin', function () {
	if(Auth::user() == null){
    	return view('admin.login');
	}else{
		return redirect()->route('home');
	}
});

Route::get('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('forget_password');
Route::post('/forget','Auth\ForgotPasswordController@forget_password')->name('forget');
Route::post('/resend-email','Auth\ForgotPasswordController@resendEmail')->name('resend-email');
Route::get('/password-change','Auth\ForgotPasswordController@passwordChange')->name('password-change');
Route::post('/passwordPost','Auth\ForgotPasswordController@passwordPost')->name('passwordPost');
Route::get('/otp','Auth\ForgotPasswordController@otp')->name('otp');
Route::get('/profile/password_change', 'HomeController@password_change')->name('password_change');
Route::post('/profile/password_change', 'HomeController@passwordChange')->name('passwordChange');
Route::get('/about_us','Auth\ForgotPasswordController@aboutUs')->name('about_us');
Route::get('/privacy-policy','Auth\ForgotPasswordController@privacyPolicy')->name('privacy-policy');
Route::get('/terms-n-conditions','Auth\ForgotPasswordController@termsConditions')->name('terms-n-conditions');
Route::get('/our-courses','Auth\ForgotPasswordController@ourCourses')->name('our-courses');
Route::get('/blog','Auth\ForgotPasswordController@blog')->name('blog');
Route::get('/blog_detail/{id}','Auth\ForgotPasswordController@blogDetail')->name('blog_detail');
Route::post('/contact_us','Auth\ForgotPasswordController@contactUs')->name('contact_us');
// Route::get('/home_course_details/{id}', 'FacilitatorController@course_details')->name('home_course_details');
Route::get('/course/detail/{id}','Auth\ForgotPasswordController@course_details')->name('/course/detail');

Route::prefix('admin')->group(function () {
	Route::get('/home', 'HomeController@dashboard')->name('home');
	Route::get('/total_facilitator', 'HomeController@total_facilitator')->name('total_facilitator');
	Route::get('/total_sponsor', 'HomeController@total_sponsor')->name('total_sponsor');
	Route::get('/total_mentor', 'HomeController@total_mentor')->name('total_mentor');
	Route::get('/total_students', 'HomeController@total_students')->name('total_students');
	Route::get('/total_active_courses', 'HomeController@total_active_courses')->name('total_active_courses');

	Route::get('/user_management', 'HomeController@userManagement')->name('user_management');
	//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
	Route::get('/user_management_second', 'HomeController@userManagementSecond')->name('user_management_second');
	//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX//
	Route::get('/getUsers/{id}/{date}', 'HomeController@getUser')->name('getUser');
	Route::post('/changeUserStatus', 'HomeController@changeUserStatus')->name('changeUserStatus');
	Route::post('/change_user_status', 'HomeController@change_user_status')->name('change_user_status');
	Route::post('/change_Course_status', 'HomeController@change_Course_status')->name('change_Course_status');
	Route::get('/userDetails', 'HomeController@userDetails')->name('userDetails');
	Route::get('/edit_user', 'HomeController@editUserView')->name('editUser');
	Route::get('/getCity/{id}', 'HomeController@getCity')->name('getCity');
	Route::get('/getPhone/{id}', 'HomeController@getPhone')->name('getPhone');
	Route::post('/edit_user', 'HomeController@editUser')->name('edit_user');
	Route::get('/delete_user', 'HomeController@delete_user')->name('delete_user');
	Route::get('/mentor_request', 'HomeController@mentor_request')->name('mentor_request');
	Route::post('/changeMentorRequest', 'HomeController@changeMentorRequest')->name('changeMentorRequest');
	Route::get('/changeMentorRequests', 'HomeController@changeMentorRequests')->name('changeMentorRequests');
	Route::get('/userexport', 'HomeController@userexport')->name('userexport');
	Route::get('/userexport_filtered', 'HomeController@userexport_filtered')->name('userexport_filtered');
	Route::get('/userdate_filtered', 'HomeController@userdate_filtered')->name('userdate_filtered');


	Route::get('/transaction_management', 'HomeController@transactionManagementView')->name('transactionManagementView');
	Route::get('/edit_transaction_management', 'HomeController@editTransactionManagementView')->name('editTransactionManagementView');
	Route::post('/editTransactionManagement', 'HomeController@edit_transaction_management')->name('edit_transaction_management');
	Route::get('/update_withdrawl_status', 'HomeController@update_withdrawl_status')->name('update_withdrawl_status');


	Route::get('/loan_management', 'HomeController@loanManagementView')->name('loanManagementView');
	Route::get('/mentors', 'HomeController@mentors')->name('mentors');
	Route::get('/mentor_assign', 'HomeController@mentor_assign')->name('mentor_assign');
	Route::get('/download_pdf', 'HomeController@download_pdf')->name('download_pdf');
	Route::post('/loan_status_rejected', 'HomeController@loan_status_rejected')->name('loan_status_rejected');
	Route::get('/loan_status_accepted', 'HomeController@loan_status_accepted')->name('loan_status_accepted');


	Route::get('/facilitator_request', 'HomeController@facilitator_request')->name('facilitator_request');
	Route::get('/sponsor_request', 'HomeController@sponsor_request')->name('sponsor_request');
	Route::get('/course_facilitator_approval_requests', 'HomeController@course_facilitator_request')->name('course_facilitator_request');
	Route::get('/facilitator_request_approve', 'HomeController@facilitator_request_approve')->name('facilitator_request_approve');


	Route::get('/course_management', 'HomeController@course_management_old')->name('course_management');
	Route::get('/course_management_filter/{filter}/{status_type}', 'HomeController@course_management_filter')->name('course_management_filter');
	Route::get('/course_management_old', 'HomeController@course_management')->name('course_management_old');
	Route::get('/course_details', 'HomeController@course_management_view')->name('course_details');
	Route::get('/download_course_pdf', 'HomeController@download_course_pdf')->name('download_course_pdf');
	Route::post('/changeCourseStatus', 'HomeController@changeCourseStatus')->name('changeCourseStatus');


	Route::get('/loylity_managemet', 'HomeController@loylity_managemet')->name('loylity_managemet');
	Route::get('/add_loylity_managemet_parameters', 'HomeController@add_loylity_managemet_parameters')->name('add_loylity_managemet_parameters');
	Route::post('/add_loylity_parameters', 'HomeController@add_loylity_parameters')->name('add_loylity_parameters');


	Route::get('/report', 'HomeController@reports')->name('report');
	Route::get('/getuser/{id}', 'HomeController@getusers')->name('getusers');
	Route::get('/search_report', 'HomeController@search_report')->name('search_report');

 
	Route::get('/system_setting', 'HomeController@system_seeting')->name('system_seeting');
	Route::post('/add_business_type', 'HomeController@add_business_type')->name('add_business_type');
	Route::post('/edit_business_type', 'HomeController@edit_business_type')->name('edit_business_type');
	Route::get('/status_change_business_type', 'HomeController@status_change_business_type')->name('status_change_business_type');
	Route::get('/delete_business_type', 'HomeController@delete_business_type')->name('delete_business_type');
	Route::post('/add_course_level', 'HomeController@add_course_level')->name('add_course_level');
	Route::post('/edit_course_level', 'HomeController@edit_course_level')->name('edit_course_level');
	Route::get('/status_change_course_level', 'HomeController@status_change_course_level')->name('status_change_course_level');
	Route::get('/delete_course_level', 'HomeController@delete_course_level')->name('delete_course_level');
	Route::post('/add_report_reason', 'HomeController@add_report_reason')->name('add_report_reason');
	Route::post('/edit_report_reason', 'HomeController@edit_report_reason')->name('edit_report_reason');
	Route::get('/status_change_report_reason', 'HomeController@status_change_report_reason')->name('status_change_report_reason');
	Route::get('/delete_report_reason', 'HomeController@delete_report_reason')->name('delete_report_reason');
	Route::post('/set_min_questions', 'HomeController@set_min_questions')->name('set_min_questions');
	Route::post('/add_course_status', 'HomeController@add_course_status')->name('add_course_status');
	Route::post('/edit_course_status', 'HomeController@edit_course_status')->name('edit_course_status');
	Route::get('/status_change_course_status', 'HomeController@status_change_course_status')->name('status_change_course_status');
	Route::get('/delete_course_status', 'HomeController@delete_course_status')->name('delete_course_status');
	Route::post('/add_stage_status', 'HomeController@add_stage_status')->name('add_stage_status');
	Route::post('/edit_stage_status', 'HomeController@edit_stage_status')->name('edit_stage_status');
	Route::get('/status_change_stage_status', 'HomeController@status_change_stage_status')->name('status_change_stage_status');
	Route::get('/delete_stage_status', 'HomeController@delete_stage_status')->name('delete_stage_status');
	Route::post('/add_city', 'HomeController@add_city')->name('add_city');
	Route::post('/edit_city', 'HomeController@edit_city')->name('edit_city');
	Route::get('/status_change_city', 'HomeController@status_change_city')->name('status_change_city');
	Route::get('/delete_city', 'HomeController@delete_city')->name('delete_city');


	Route::get('/cms_view', 'HomeController@cms')->name('cms');
	Route::get('/cms_list', 'HomeController@cms_list')->name('cms_list');
	Route::post('/add_cms', 'HomeController@add_cms')->name('add_cms');
	Route::get('/edit_cms_list', 'HomeController@edit_cms_list')->name('edit_cms_list');
	Route::post('/editCmsList', 'HomeController@editCmsList')->name('editCmsList');
	Route::get('/delete_cms', 'HomeController@delete_cms')->name('delete_cms');


	Route::get('/sub_admin', 'HomeController@sub_admin')->name('sub_admin');
	Route::get('/add_sub_admin', 'HomeController@add_sub_admin')->name('add_sub_admin');
	Route::post('/addSubAdmin', 'HomeController@addSubAdmin')->name('addSubAdmin');
	Route::post('/addSubAdminPage', 'HomeController@addSubAdminPage')->name('addSubAdminPage');
	Route::post('/addSubAdminPageAccess', 'HomeController@addSubAdminPageAccess')->name('addSubAdminPageAccess');
	Route::get('/sub_admin/unauthorized', 'HomeController@unauthorized')->name('unauthorized');
	Route::get('/sub_admin/edit/permission', 'HomeController@edit_sub_admin_permission')->name('edit_sub_admin_permission');


	Route::get('/email_notification_templates', 'HomeController@email_notification_templates')->name('email_notification_templates');
	Route::get('/send_email_notification', 'HomeController@email_notification')->name('email_notification');
	Route::post('/sendEmailNotification', 'HomeController@send_email_notification')->name('send_email_notification');
	Route::get('/select_user_type/{id}', 'HomeController@select_user_type')->name('select_user_type');
	Route::get('/add_email_template', 'HomeController@add_email_template')->name('add_email_template');
	Route::post('/addEmailTemplate', 'HomeController@addEmailTemplate')->name('addEmailTemplate');

	Route::get('/edit_email_template', 'HomeController@edit_email_template')->name('edit_email_template');
	Route::post('/editEmailTemplate', 'HomeController@editEmailTemplate')->name('editEmailTemplate');
	Route::get('/delete_email_template', 'HomeController@delete_email_template')->name('delete_email_template');
	Route::post('/change_status_email_template', 'HomeController@change_status_email_template')->name('change_status_email_template');

	Route::get('/send_sms_notification', 'HomeController@send_sms_notification')->name('send_sms_notification');
	Route::get('/select_user_for_sms/{id}', 'HomeController@select_user_for_sms')->name('select_user_for_sms');
	Route::post('/sendSMSNotification', 'HomeController@sendSMSNotification')->name('sendSMSNotification');

	Route::get('/blog_management', 'HomeController@blog_management')->name('blog_management');
	Route::post('/change_blog_status', 'HomeController@change_blog_status')->name('change_blog_status');
	Route::get('/edit_blog', 'HomeController@blog_detail')->name('blog_detail');
	Route::get('/add_blog', 'HomeController@add_blog')->name('add_blog');
	Route::post('/addBlog', 'HomeController@addBlog')->name('addBlog');
	Route::post('/editBlog', 'HomeController@editBlog')->name('editBlog');
	Route::post('/notifications','HomeController@notifications')->name('notifications');
});

Route::prefix('facilitator')->group(function () {
	Route::get('/home', 'FacilitatorController@dashboard')->name('facilitator_home');

	Route::get('/my_profile', 'FacilitatorController@my_profile')->name('facilitator_complete_profile');
	Route::post('/edit_my_profile', 'FacilitatorController@edit_my_profile')->name('facilitator_edit_my_profile');
	Route::get('/city/{id}', 'FacilitatorController@getCity')->name('faci_getCity');
	Route::get('/phone/{id}', 'FacilitatorController@getPhone')->name('faci_getPhone');
	Route::post('/password_change', 'FacilitatorController@passwordChange')->name('facilitator_password_change');

	Route::get('/create_course', 'FacilitatorController@create_course')->name('faci_create_course');
	Route::post('/createCourse', 'FacilitatorController@createCourse')->name('faci_createCourse');
	Route::get('/course_details', 'FacilitatorController@course_details')->name('faci_course_details');

	Route::get('/add_module', 'FacilitatorController@add_module')->name('faci_add_module');
	Route::post('/addModule', 'FacilitatorController@addModule')->name('faci_addModule');

	Route::get('/add_skills', 'FacilitatorController@add_skills')->name('faci_add_skills');
	Route::post('/addSkills', 'FacilitatorController@addSkills')->name('faci_addSkills');
	Route::get('/getModule/{id}', 'FacilitatorController@getModule')->name('getModule');

	Route::get('/add_questions/{id}/{q_id?}', 'FacilitatorController@add_questions')->name('faci_add_questions');
	Route::get('/questions_edit/{id}/{q_id?}', 'FacilitatorController@add_questions_edit')->name('faci_questions_edit');
	Route::get('/questions_add/{id}/{q_id?}', 'FacilitatorController@questions_add')->name('faci_questions_add');
	Route::post('/addQuestionsPost', 'FacilitatorController@addQuestions')->name('addQuestionsPost');
	Route::post('/questionsAddPost', 'FacilitatorController@questionsAdd')->name('questionsAddPost');
	Route::get('/add_questions_in_bulk/{id}', 'FacilitatorController@add_questions_in_bulk')->name('faci_add_questions_in_bulk');
	Route::post('/add_bulk_questions', 'FacilitatorController@add_bulk_questions')->name('faci_add_bulk_questions');

	Route::get('/rating_and_review', 'FacilitatorController@rating_and_review')->name('faci_rating_and_review');

	Route::get('/favourites', 'FacilitatorController@favourites')->name('faci_favourites');

	Route::get('/fan_following', 'FacilitatorController@fan_following')->name('faci_fan_following');

	Route::post('/block', 'FacilitatorController@block')->name('block');
	Route::get('/switch','FacilitatorController@switch')->name('switch');


	Route::get('/forum','FacilitatorController@forum')->name('forum');
	Route::get('/create-forum','FacilitatorController@createForum')->name('create-forum');
	Route::post('/create-forum-post','FacilitatorController@createForumPost')->name('create-forum-post');
	Route::post('/forum_like', 'FacilitatorController@forumLike')->name('forum_like');
	Route::post('/forum_dislike', 'FacilitatorController@forumDislike')->name('forum_dislike');

	Route::get('/public_forum','FacilitatorController@Publicforum')->name('public_forum');
	Route::get('/create_public_forum','FacilitatorController@createPublicForum')->name('create_public_forum');
	Route::post('/create-public-post','FacilitatorController@createPublicForumPost')->name('create-public-post');
	

	Route::get('/search_forum','FacilitatorController@searchForum')->name('search_forum');
	Route::post('/public_comments-post', 'FacilitatorController@publicCommentsPost')->name('public_comments_post');
	Route::post('/like', 'FacilitatorController@publicForumLike')->name('like');
	Route::post('/dislike', 'FacilitatorController@publicForumDislike')->name('dislike');

	Route::post('/comments-post', 'FacilitatorController@commentsPost')->name('comments-post');

	Route::post('/delete-module', 'FacilitatorController@deleteModule')->name('delete-module');

	Route::get('/refer-n-earn','FacilitatorController@referEarn')->name('refer-n-earn');
	
	

	Route::get('/wallets','FacilitatorController@wallets')->name('wallets');
	Route::get('/withdrawl','FacilitatorController@withdrawl')->name('withdrawl');
	Route::post('/withdrawl-post','FacilitatorController@withdrawlPost')->name('withdrawl-post');
	Route::get('/withdrawl-request','FacilitatorController@withdrawlRequest')->name('withdrawl-request');
	Route::post('/withdrawl_request','FacilitatorController@withdrawlRequestPost')->name('withdrawl_request');


	Route::get('/message','FacilitatorController@messages')->name('message');
	Route::get('/chat','FacilitatorController@chat');
	Route::post('/chatPost','FacilitatorController@chatPost')->name('chatPost');
	Route::get('/chatDelete','FacilitatorController@chatDelete')->name('chatDelete');

	Route::get('/my-course','FacilitatorController@myCourse')->name('my-course');
	Route::get('/about-us','FacilitatorController@aboutUs')->name('about-us');
Route::get('/privacy_policy','FacilitatorController@privacyPolicy')->name('privacy_policy');
Route::get('/terms_conditions','FacilitatorController@termsConditions')->name('terms_conditions');
Route::get('/notifications-push','FacilitatorController@notificationsPush')->name('notifications-push');

});

Route::prefix('sponsors')->group(function () {
	Route::get('/home', 'SponsorController@dashboard')->name('sponsor_home');
	Route::post('/sponsor-change-password', 'SponsorController@sponsorPasswordChange')->name('sponsor-change-password');
	Route::post('/sponsor_edit_profile', 'SponsorController@sponsorEditProfile')->name('sponsor_edit_profile');
	Route::get('/sponsored_course', 'SponsorController@sponsorHome')->name('sponsored_course');
	Route::get('/reports', 'SponsorController@reports')->name('reports');
	Route::get('/reports/filter', 'SponsorController@reports')->name('/reports/filter');
	Route::get('/course-sponsor', 'SponsorController@courseSponsor')->name('course-sponsor');
	Route::post('/course-shared', 'SponsorController@courseShared')->name('course-shared');
	Route::get('/checkout', 'SponsorController@Checkout')->name('checkout');
	Route::get('/sponsor-wallet', 'SponsorController@SponsorWallet')->name('sponsor-wallet');
	Route::post('/add-card', 'SponsorController@AddCard')->name('add-card');
	Route::get('/pay-form', 'SponsorController@PayForm')->name('pay-form');
	Route::post('/pay', 'SponsorController@redirectToGateway')->name('pay');
	Route::get('/payment/callback', 'SponsorController@handleGatewayCallback');
	Route::post('/sponsor-purchase-course', 'SponsorController@sponsorPurchaseCourse')->name('sponsor-purchase-course');
	Route::get('/course-details/{id}', 'StudentController@myCourseDetails')->name('/course-details');
	Route::get('/sponsor-notifications', 'SponsorController@notification')->name('sponsor-notifications');
});

Route::group(['prefix'=>'students','middleware'=>['afterLoginAuth']],function () {
	Route::get('/home', 'StudentController@dashboard')->name('student_home');
	Route::get('/my-profile', 'StudentController@my_profile')->name('students_profile');
	Route::post('/change_password', 'StudentController@changePassword')->name('student_password_change');
	Route::post('/edit_profile', 'StudentController@editProfile')->name('student_edit_profile');

	Route::get('/view_favourites', 'StudentController@viewFavourites')->name('view_favourites');
	Route::get('/addtofavourites/{id}', 'StudentController@addToFavourites')->name('addtofavourites');


	Route::get('/my-sponsored-course', 'StudentController@mySponsoredCourse')->name('my-sponsored-course');
	Route::get('/student_course_details', 'StudentController@course_details')->name('stu_course_details');

	Route::get('/facilator_profile/{id}', 'StudentController@facilator_profile')->name('facilator_profile');
	Route::get('/sponsor_profile/{id}', 'StudentController@sponsor_profile')->name('sponsor_profile');
	Route::get('/my-course-details/{id}', 'StudentController@myCourseDetails')->name('my-course-details');
	Route::get('/remove_favourites/{id}', 'StudentController@removeFavourites')->name('remove_favourites');
	Route::get('/stu-skill-assessment/{id}/{q_id?}/{courseId}', 'StudentController@stuSkillAssessment')->name('stu-skill-assessment');
	Route::get('/stu-skill-assessment-completed/{id}/{q_id}/{courseId}', 'StudentController@stuSkillAssessment')->name('stu-skill-assessment-completed');
	Route::get('score-board/{courseId}/{percentage}', 'StudentController@stuSkillAssessment')->name('score-board');
	Route::post('/add-answer', 'StudentController@addAnswer')->name('add-answer');
	Route::get('/fan-following/{id}', 'StudentController@fanFollowing')->name('fan-following');

	Route::get('/remove_to_favourites/{id}', 'StudentController@removeToFavourites')->name('remove_to_favourites');

	Route::get('/student_forum','StudentController@forum')->name('student_forum');
	Route::get('/student_create-forum','StudentController@createForum')->name('student_create-forum');
	Route::post('/student_create-forum-post','StudentController@createForumPost')->name('student_create-forum-post');
	Route::post('/student_forum_like', 'StudentController@forumLike')->name('student_forum_like');
	Route::post('/student_forum_dislike', 'StudentController@forumDislike')->name('student_forum_dislike');
	Route::get('/refer-earn','StudentController@referEarn')->name('refer-earn');

	Route::get('/loan','StudentController@loan')->name('loan');
	Route::get('/loans-apply/{id}','StudentController@loansApply')->name('loans-apply');
	Route::post('/loans-apply-post','StudentController@loansApplyPost')->name('loans-apply-post');
	Route::get('/loan-form1/{id}','StudentController@loanForm1')->name('loan-form1');
	Route::get('/loan-form2/{id}','StudentController@loanForm2')->name('loan-form2');
	Route::post('/loan-form1-post','StudentController@loanForm1Psot')->name('loan-form1-post');

	Route::get('/stu-message','StudentController@stuMessage')->name('stu-message');

	Route::get('/certificate','StudentController@certificate')->name('certificate');
	Route::get('/student-wallet', 'StudentController@StudentWallet')->name('student-wallet');
	Route::post('/stu-pay', 'SponsorController@redirectToGateway')->name('stu-pay');
	Route::get('/checkout', 'StudentController@Checkout')->name('stu-checkout');
	Route::post('/student-purchase-course', 'SponsorController@sponsorPurchaseCourse')->name('student-purchase-course');
	Route::post('/stu-add-card', 'SponsorController@AddCard')->name('stu-add-card');
	Route::get('/order-details', 'SponsorController@orderDetails')->name('stu-order-details');
	Route::post('/retake-assessment', 'StudentController@retakeAssessment')->name('retake-assessment');
	Route::get('/notifications', 'StudentController@notification')->name('stu-notifications');
	Route::get('/module-detail/{id}', 'StudentController@modDetails')->name('module-detail');
	Route::post('/submit/review', 'StudentController@submitReview')->name('/submit/review');

});