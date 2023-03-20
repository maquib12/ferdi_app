<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Course;

class CourseFacilitatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach (Course::all() as $course) {
            $users = User::all()->skip(10)->take(6)->pluck('id');
            $course->facilitator()->attach($users);
        }
    }
}
