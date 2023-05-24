<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Emil',
            'email' => 'emildobber2@hotmail.com',
            'password' => bcrypt('emildobber'),
            'current_team_id' => 1
        ]);
    }
}
