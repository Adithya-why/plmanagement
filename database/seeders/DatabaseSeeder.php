<?php

namespace Database\Seeders;

//import all models

use App\Models\User;
use App\Models\Student;
use App\Models\Company;
use App\Models\Registration;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Type\Decimal;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        

        //put some data into tables 

        //insert user with hashed password
        $user = User::create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('user1user1')
        ]);
        


        //insert studnetd details with user id linked
        $student = Student::create([
            'deptno' => '29-UCS-001',
            'name' => 'Jaay',
            'department' => 'computer science',
            'cgpa' => 10.00,
            'userid' => $user->id,
        ]);


        $company = Company::create([
            'name' => 'Amazon',
            'position' => 'Cloud Architect'
        ]);

        $registration = Registration::create([
            'companyid' => $company->id,
            'studentid' => $student->id,
        ]);



    }
}
