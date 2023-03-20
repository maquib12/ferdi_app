<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        $users = array(
            array('id' => '1','name' => 'Super Admin','email' => 'superadmin@gmail.com', 'password' => Hash::make('superadmin@123'), 'user_type_id' => 1, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '2','name' => 'Admin','email' => 'admin@gmail.com', 'password' => Hash::make('admin@123'), 'user_type_id' => 2, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '3','name' => 'Mentor1','email' => 'mentor1@gmail.com', 'password' => Hash::make('mentor@123'), 'user_type_id' => 3, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '4','name' => 'Mentor2','email' => 'mentor2@gmail.com', 'password' => Hash::make('mentor@123'), 'user_type_id' => 3, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '5','name' => 'Mentor3','email' => 'mentor3@gmail.com', 'password' => Hash::make('mentor@123'), 'user_type_id' => 3, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '6','name' => 'Mentor4','email' => 'mentor4@gmail.com', 'password' => Hash::make('mentor@123'), 'user_type_id' => 3, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '7','name' => 'Mentor5','email' => 'mentor5@gmail.com', 'password' => Hash::make('mentor@123'), 'user_type_id' => 3, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '8','name' => 'Mentor6','email' => 'mentor6@gmail.com', 'password' => Hash::make('mentor@123'), 'user_type_id' => 3, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '9','name' => 'Mentor7','email' => 'mentor7@gmail.com', 'password' => Hash::make('mentor@123'), 'user_type_id' => 3, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '10','name' => 'Mentor8','email' => 'mentor8@gmail.com', 'password' => Hash::make('mentor@123'), 'user_type_id' => 3, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '11','name' => 'Facilitator1','email' => 'facilitator1@gmail.com', 'password' => Hash::make('facilitator@123'), 'user_type_id' => 4, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '12','name' => 'Facilitator2','email' => 'facilitator2@gmail.com', 'password' => Hash::make('facilitator@123'), 'user_type_id' => 4, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '13','name' => 'Facilitator3','email' => 'facilitator3@gmail.com', 'password' => Hash::make('facilitator@123'), 'user_type_id' => 4, 'status' => 2, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '14','name' => 'Facilitator4','email' => 'facilitator4@gmail.com', 'password' => Hash::make('facilitator@123'), 'user_type_id' => 4, 'status' => 2, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '15','name' => 'Facilitator5','email' => 'facilitator5@gmail.com', 'password' => Hash::make('facilitator@123'), 'user_type_id' => 4, 'status' => 2, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '16','name' => 'Facilitator1','email' => 'facilitator6@gmail.com', 'password' => Hash::make('facilitator@123'), 'user_type_id' => 4, 'status' => 2, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '17','name' => 'Facilitator1','email' => 'facilitator7@gmail.com', 'password' => Hash::make('facilitator@123'), 'user_type_id' => 4, 'status' => 2, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '18','name' => 'Sponsor1','email' => 'sponsor1@gmail.com', 'password' => Hash::make('sponsor@123'), 'user_type_id' => 5, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '19','name' => 'Sponsor2','email' => 'sponsor2@gmail.com', 'password' => Hash::make('sponsor@123'), 'user_type_id' => 5, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '20','name' => 'Sponsor3','email' => 'sponsor3@gmail.com', 'password' => Hash::make('sponsor@123'), 'user_type_id' => 5, 'status' => 2, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '21','name' => 'Sponsor4','email' => 'sponsor4@gmail.com', 'password' => Hash::make('sponsor@123'), 'user_type_id' => 5, 'status' => 2, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '22','name' => 'Sponsor5','email' => 'sponsor5@gmail.com', 'password' => Hash::make('sponsor@123'), 'user_type_id' => 5, 'status' => 2, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '23','name' => 'Sponsor6','email' => 'sponsor6@gmail.com', 'password' => Hash::make('sponsor@123'), 'user_type_id' => 5, 'status' => 2, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '24','name' => 'Sponsor7','email' => 'sponsor7@gmail.com', 'password' => Hash::make('sponsor@123'), 'user_type_id' => 5, 'status' => 2, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '25','name' => 'Student1','email' => 'student1@gmail.com', 'password' => Hash::make('12345678'), 'user_type_id' => 6, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '26','name' => 'Student2','email' => 'student2@gmail.com', 'password' => Hash::make('12345678'), 'user_type_id' => 6, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '27','name' => 'Student3','email' => 'student3@gmail.com', 'password' => Hash::make('12345678'), 'user_type_id' => 6, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '28','name' => 'Student4','email' => 'student4@gmail.com', 'password' => Hash::make('12345678'), 'user_type_id' => 6, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '29','name' => 'Student5','email' => 'student5@gmail.com', 'password' => Hash::make('12345678'), 'user_type_id' => 6, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '30','name' => 'Student6','email' => 'student6@gmail.com', 'password' => Hash::make('12345678'), 'user_type_id' => 6, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

            array('id' => '31','name' => 'Student7','email' => 'student7@gmail.com', 'password' => Hash::make('12345678'), 'user_type_id' => 6, 'status' => 1, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()),

        );
        DB::table('users')->insert($users);
    }
}