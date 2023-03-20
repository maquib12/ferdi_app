<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
     $businesses = array(
            array('business_name' => 'Educational Training', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('business_name' => 'Technical Training', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('business_name' => 'Production Industry', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('businesses')->insert($businesses);
    }
}
