<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pages = array(
            array('page_name' => 'Dashboard','parent_page_id' => 0 ,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'User Management','parent_page_id' => 0 ,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'Course Management','parent_page_id' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'Transaction Management','parent_page_id' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'Loyalty Point Management','parent_page_id' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'Loan Management','parent_page_id' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'Reports','parent_page_id' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'Sub Admin Management','parent_page_id' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'Notification Management','parent_page_id' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'Email Templates Management','parent_page_id' => 9, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'Email Notifications Management','parent_page_id' => 9, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'SMS Notifications Management','parent_page_id' => 9, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'CMS Management','parent_page_id' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'Settings Management','parent_page_id' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('page_name' => 'Blog Management','parent_page_id' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('pages')->insert($pages);
    }
}