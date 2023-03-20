<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SubAdminSeeder extends Seeder
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
            array('id' => '7','user_type' => 'Sub Admin','status' => 1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('usertypes')->insert($usertypes);
    }
}
