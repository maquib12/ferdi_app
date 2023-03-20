<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $languages = array(
            array('language' => 'English', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('language' => 'French', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('language' => 'German', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('languages')->insert($languages);
    }
}
