<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Job::truncate();
        Schema::enableForeignKeyConstraints();

        $data= [
            ['name' => 'IT Developer'],
            ['name' => 'Project Management'],
            ['name' => 'Human Resource'],
            ['name' => 'Administrative'],
            ['name' => 'Business Operation'],
            ['name' => 'Consultant'],
        ];

        foreach ($data as $value) {
            Job::insert([
                'name' => $value['name'],
            ]);
        }
        
    }
}
