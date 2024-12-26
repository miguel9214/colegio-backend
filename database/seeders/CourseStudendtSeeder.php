<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseStudendtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
             DB::table('course_student')->insert([
            'course_id' => 1,
            'student_id' => 1,

        ]);
    }
}
