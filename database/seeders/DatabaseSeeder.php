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
        DB::table('users')->insert([
            'name' => 'Lorem Neupane',
            'email' => 'lorem@gmail.com',
            'role' => 'moderator',
            'password' => Hash::make('yashu'),
            'profile_pic' => $faker->image('public/storage/images', 600, 480 , null, false)
        ]);



        // DB::table('aboutuses')->insert([
        //     'whoweare' => $faker->name,
        //     'officelocation' => $faker->city,
        //     'contactus' => $faker->phoneNumber
        // ]);

        // foreach(range(1,5) as $value)
        // {
        //     DB::table('contactuses')->insert([
        //         'name' => $faker->name,
        //         'email' => $faker->email,
        //         'message' => $faker->city
        //     ]);
        // }
    }
}
