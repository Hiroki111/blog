<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::all()->first();
        $user2 = User::find($user1->id + 1);
        $faker = Faker\Factory::create();

        DB::table('posts')->insert([
            'user_id'      => $user1->id,
            'active'       => 1,
            'title'        => 'title 1',
            'published_at' => Carbon::now(),
            'body'         => $faker->paragraph(50),
        ]);

        DB::table('posts')->insert([
            'user_id' => $user1->id,
            'active'  => 0,
            'title'   => 'title 2',
            'body'    => $faker->paragraph(5),
        ]);

        DB::table('posts')->insert([
            'user_id'      => $user2->id,
            'active'       => 1,
            'title'        => 'title 3',
            'published_at' => Carbon::now(),
            'body'         => $faker->paragraph(30),
        ]);
    }
}
