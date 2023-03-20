<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cities = array(
            array('name' => 'Kolkata','country_id' => 99,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('name' => 'Delhi','country_id' => 99,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('name' => 'Mumbai','country_id' => 99,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('name' => 'Chennai','country_id' => 99,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('name' => 'Paris','country_id' => 73,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('name' => 'Lyon','country_id' => 73,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('name' => 'Nice','country_id' => 73,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('name' => 'Dhaka','country_id' => 18,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('name' => 'Khulna','country_id' => 18,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('name' => 'Chattogram','country_id' => 18,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('name' => 'Sylhet','country_id' => 18,'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('cities')->insert($cities);
    }
}
