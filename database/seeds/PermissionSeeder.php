<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = array(
            array('page_id' => 1, 'sub_admin' => 38 ,'created_at' => Carbon::now(),'updated_at' => Carbon::now(), 'add' => 1, 'edit'=> 1 ,'delete' => 1),
            array('page_id' => 2, 'sub_admin' => 38 ,'created_at' => Carbon::now(),'updated_at' => Carbon::now(), 'add' => 1, 'edit'=> 1 ,'delete' => 1),
            array('page_id' => 3, 'sub_admin' => 38 ,'created_at' => Carbon::now(),'updated_at' => Carbon::now(), 'add' => 1, 'edit'=> 1 ,'delete' => 1),
            array('page_id' => 1, 'sub_admin' => 41 ,'created_at' => Carbon::now(),'updated_at' => Carbon::now(), 'add' => 1, 'edit'=> 1 ,'delete' => 1),
            array('page_id' => 3, 'sub_admin' => 41 ,'created_at' => Carbon::now(),'updated_at' => Carbon::now(), 'add' => 0, 'edit'=> 0 ,'delete' => 1),
            array('page_id' => 9, 'sub_admin' => 41 ,'created_at' => Carbon::now(),'updated_at' => Carbon::now(), 'add' => 1, 'edit'=> 0 ,'delete' => 1),
            array('page_id' => 2, 'sub_admin' => 42 ,'created_at' => Carbon::now(),'updated_at' => Carbon::now(), 'add' => 1, 'edit'=> 0 ,'delete' => 0),
            array('page_id' => 11, 'sub_admin' => 42 ,'created_at' => Carbon::now(),'updated_at' => Carbon::now(), 'add' => 1, 'edit'=> 1 ,'delete' => 1),
            
        );
        DB::table('permissions')->insert($permissions);
    }
}
