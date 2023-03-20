<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CMSApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $applications = array(
            array('applications' => 'Homepage', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('applications' => 'How it Works', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('applications' => 'Blogs', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('applications' => 'Terms and conditions', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('applications' => 'Privacy policy', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('applications' => 'Contact Us', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('applications' => 'About us', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('applications' => 'Cookie Policy', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('cmssupportsections')->insert($applications);
    }
}
