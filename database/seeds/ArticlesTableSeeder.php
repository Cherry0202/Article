<?php
//fakerを１つ１つに宣言するタイプ

//use Illuminate\Database\Seeder;
//
//use Illuminate\Support\Facades\DB;
//use Faker\Factory as Faker;
//use Carbon\Carbon;
//use App\Article;
//
//class ArticlesTableSeeder extends Seeder
//{
//    public function run()
//    {
//        DB::table('articles')->delete(); // Query Builder を使って、Articlesテーブルのレコードを全て削除
//
//        $faker = Faker::create('en_US'); //  Faker を使用してダミーデータを作成
//
//        for ($i = 0; $i < 10; $i++) {    // 10件の Article データを作成
//            Article::create([
//                'title' => $faker->sentence(),
//                'body' => $faker->paragraph(),
//                'published_at' => Carbon::today()
//            ]);
//        }
//    }
//}

//factory（）を使用
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->delete();

        $user = App\User::first();  //ユーザを一件取得

        factory(App\Article::class, 20)->create([ // 修正
            'user_id' => $user->id,
        ]);// factory() 関数に作成するモデルのクラス名と件数を指定し、DBにデータを作成
    }
}
