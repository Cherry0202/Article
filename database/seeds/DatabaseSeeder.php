<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * データベース初期値設定の実行
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10) . '@gmail.com',
            'password' => bcrypt('secret'),
        ]);
        $this->call([
            ArticlesTableSeeder::class, // 呼び出し
            UsersTableSeeder::class,
            // OtherTableSeeder::class, // 複数呼ぶ場合
        ]);
    }
}
