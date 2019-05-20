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
        //
        DB::table('users')->delete();

//        factory(App\User::class, 50)->create()->each(function ($user) {
//                $user->posts()->save(factory(App\Post::class)->make());
//        });
        App\User::create([
            'name' => 'root',
            'email' => 'root@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
