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
            'identification' => '123456',
            'firstname' => 'miguel',
            'lastname' => 'ramos',
            'photo' => 'photo.jpg',
            'created_by_user' => 1,
        ]);
    }
}
