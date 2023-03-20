<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MentorRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $mentor_request = array(
            array('facilitator_id' => 11,'status' => 2,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('facilitator_id' => 12,'status' => 2,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('facilitator_id' => 13,'status' => 2,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('mentorrequests')->insert($mentor_request);
    }
}
