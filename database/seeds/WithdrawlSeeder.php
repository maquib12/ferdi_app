<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WithdrawlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $withdrawls = array(
            array('user_id' => 3,'withdrawl_amount' => 10,'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 4,'withdrawl_amount' => 15,'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 5,'withdrawl_amount' => 6,'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 6,'withdrawl_amount' => 11,'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 7,'withdrawl_amount' => 10,'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 8,'withdrawl_amount' => 10,'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 9,'withdrawl_amount' => 10,'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 10,'withdrawl_amount' => 15,'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 11,'withdrawl_amount' => 15,'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 12,'withdrawl_amount' => 50,'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 13,'withdrawl_amount' => 5,'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 14,'withdrawl_amount' => 13,'status' => 0, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('withdrawls')->insert($withdrawls);
    }
}
