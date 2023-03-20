<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\User;

class MentorSeeder extends Seeder
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
            $users = User::all()->skip(2)->take(6)->pluck('id');
            $course->mentors()->attach($users);
        }
    }
}
