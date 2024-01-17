<?php

namespace Database\Seeders;

use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Employee::truncate();
        Schema::enableForeignKeyConstraints();

        $data= [
            [
                'name' => 'Ilham zaki', 
                'gender' => 'L', 
                'email' => "ilhamzaki32@gmail.com",
                'phone' => "082295309961",
                'address' => "Jl. Nusa Indah Raya No 14 Rancaekek",
                'job_id' => 1
            ],
        ];

        foreach ($data as $value) {
            Employee::insert([
                'name' => $value['name'],
                'gender' => $value['gender'], 
                'email' => $value['email'],
                'phone' => $value['phone'],
                'address' => $value['address'],
                'job_id' => $value['job_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        // Employee::factory()
        //     ->count(3)
        //     ->create();
    }
}
