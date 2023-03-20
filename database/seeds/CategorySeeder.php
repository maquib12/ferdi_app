<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = array(
            array('category_name' => 'Business', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('category_name' => 'Accounts & Finance', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
            array('category_name' => 'Agriculture', 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),
        );
        DB::table('categories')->insert($categories);
    }
}
