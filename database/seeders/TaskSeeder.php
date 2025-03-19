<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // Instantiate Faker
        $faker = Faker::create();

        // Seed 10 task records
        for ($i = 0; $i < 20; $i++) {
            DB::table('tasks')->insert([
                'title' => $faker->sentence, 
                'description' => $faker->paragraph, 
                'due_date' => $faker->date, 
                'assigned_user' => $faker->name, 
                'status' => $faker->randomElement(['Pending', 'Incomplete', 'Completed']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
