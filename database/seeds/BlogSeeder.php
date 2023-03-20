<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $blogs = array(
            array('title' => 'Blog 1', 'content' => 'Test Content 1', 'created_by' => 10, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('title' => 'Blog 2', 'content' => 'Test Content 2', 'created_by' => 11, 'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('title' => 'Blog 3', 'content' => 'Test Content 3', 'created_by' => 12, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('title' => 'Blog 4', 'content' => 'Test Content 4', 'created_by' => 13, 'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('blogs')->insert($blogs);
    }
}
