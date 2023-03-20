<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 3; $i<=31 ;$i++){
        	$wallet[$i] = ['user_id' => $i,'transaction_type' => 'credited','debited_for_course' => null,'comes_from' => 'registration','amount' => 30,'created_at' => Carbon::now(),'updated_at' => Carbon::now()];
        }
        for($i = 10; $i<=20 ;$i++){
            $wallet[$i] = ['user_id' => $i,'transaction_type' => 'credited','debited_for_course' => null,'comes_from' => 'referal','amount' =>1,'created_at' => Carbon::now(),'updated_at' => Carbon::now()];
        }
        for($i = 15; $i<=20 ;$i++){
            $wallet[$i] = ['user_id' => $i,'transaction_type' => 'debited','debited_for_course' => 1,'comes_from' => null,'amount' =>5,'created_at' => Carbon::now(),'updated_at' => Carbon::now()];
        }
        for($i = 20; $i<=25 ;$i++){
            $wallet[$i] = ['user_id' => $i,'transaction_type' => 'debited','debited_for_course' => 2,'comes_from' => null,'amount' =>4,'created_at' => Carbon::now(),'updated_at' => Carbon::now()];
        }
        DB::table('wallets')->insert($wallet);
    }
}
