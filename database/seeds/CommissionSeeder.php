<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 7; $i<=13 ;$i++){
        	$wallet[$i] = ['user_id' => $i,'transaction_type' => 'credited','debited_for_course' => null,'comes_from' => 'commission','amount' => 10,'created_at' => Carbon::now(),'updated_at' => Carbon::now()];
        }
        DB::table('wallets')->insert($wallet);
    }
}
