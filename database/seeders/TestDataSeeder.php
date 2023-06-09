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
        //Users
        DB::table('users')->insert([
            'name' => 'Emil',
            'email' => 'emildobber2@hotmail.com',
            'password' => bcrypt('emildobber'),
            'current_team_id' => 1
        ]);

        //Tags
        DB::table('tags')->insert([
            'name' => 'Quick',
        ]);

        DB::table('tags')->insert([
            'name' => 'Easy',
        ]);

        DB::table('tags')->insert([
            'name' => 'One-pot',
        ]);

        //Origins
        DB::table('origins')->insert([
            'name' => 'Vietnam',
        ]);

        DB::table('origins')->insert([
            'name' => 'Pakistan',
        ]);

        DB::table('origins')->insert([
            'name' => 'Japan',
        ]);


        DB::table('ingredients')->insert([
            'name' => 'Fish sauce',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Ghee',
        ]);

        DB::table('ingredients')->insert([
            'name' => 'Mirin',
        ]);

        DB::table('measurement_units')->insert([
            'name' => 'ml',
        ]);

        DB::table('measurement_units')->insert([
            'name' => 'l',
        ]);

        DB::table('measurement_units')->insert([
            'name' => 'g',
        ]);

        DB::table('measurement_units')->insert([
            'name' => 'kg',
        ]);

        DB::table('measurement_units')->insert([
            'name' => 'Tablespoon',
        ]);

        DB::table('measurement_units')->insert([
            'name' => 'Teaspoon',
        ]);
    }
}
