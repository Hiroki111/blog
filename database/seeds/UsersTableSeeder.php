<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->insert([
            'name'     => $faker->name,
            'email'    => 'user1@gmail.com',
            'password' => bcrypt("adminpass1"),
        ]);
        DB::table('users')->insert([
            'name'     => $faker->name,
            'email'    => 'user2@gmail.com',
            'password' => bcrypt("adminpass2"),
        ]);
        DB::table('users')->insert([
            'name'     => $faker->name,
            'email'    => 'user3@gmail.com',
            'password' => bcrypt("adminpass3"),
        ]);
        DB::table('users')->insert([
            'name'     => $faker->name,
            'email'    => 'user4@gmail.com',
            'password' => bcrypt("adminpass4"),
        ]);
    }
}
