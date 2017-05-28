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
        DB::table('users')->insert([
            'name'     => 'Malcolm Turnbull',
            'email'    => 'user1@gmail.com',
            'password' => bcrypt("adminpass1"),
        ]);
        DB::table('users')->insert([
            'name'     => 'Tony Abbott',
            'email'    => 'user2@gmail.com',
            'password' => bcrypt("adminpass2"),
        ]);
        DB::table('users')->insert([
            'name'     => 'Kevin Rudd',
            'email'    => 'user3@gmail.com',
            'password' => bcrypt("adminpass3"),
        ]);
        DB::table('users')->insert([
            'name'     => 'Julia Gillard',
            'email'    => 'user4@gmail.com',
            'password' => bcrypt("adminpass4"),
        ]);
    }
}
