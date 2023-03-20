<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $loan = array(
            array('user_id' => 27,'loan_application' => 'Test.docx','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 28,'loan_application' => 'Test.docx','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 27,'loan_application' => 'Test.docx','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('user_id' => 29,'loan_application' => 'Test.docx','created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('loans')->insert($loan);
    }
}
