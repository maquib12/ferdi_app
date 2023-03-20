<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usertypes = array(
            array('id' => '1','user_type' => 'Super Admin','status' => 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '2','user_type' => 'Admin','status' => 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '3','user_type' => 'Mentor','status' => 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '4','user_type' => 'Facilitator','status' => 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '5','user_type' => 'Sponsor','status' => 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('id' => '6','user_type' => 'Student','status' => 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('usertypes')->insert($usertypes);
    }
}
