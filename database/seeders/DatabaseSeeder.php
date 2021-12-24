<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // DB::table('users')->insert([
        //     'name' => 'Yashu Neupane',
        //     'email' => 'yashu@gmail.com',
        //     'password' => Hash::make('yashu')
        // ]);

        DB::table('contactuses')->insert([
            'name' => $faker->name,
            'email' => $faker->email,
            'message' => $faker->city
        ]);

        foreach(range(1,5) as $value)
        {
            DB::table('aboutuses')->insert([
                'whoweare' => $faker->name,
                'officelocation' => $faker->city,
                'contactus' => $faker->phoneNumber
            ]);
        }
    }
}
