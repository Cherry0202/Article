<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller {
    //middlewareの適用
    public function __construct()
    {
        $this->middleware('auth')
            ->except(['index', 'show']);
    }

    //article tableの全データ取り出して、view(articles/index)に渡す
    public function index() {
        //$articles = Article::all();
        //all() を使って記事を全件取得していた部分を、latest()->get() に変更して、作成日の降順に記事をソートするよう修正
        $articles = Article::latest('published_at')->latest('created_at')
            //where をメソッドチェインに追加
            //->where('published_at', '<=', Carbon::now())
            //SCOPEの使用
            ->published()
            ->get();
        return view('articles.index', compact('articles'));
    }
    //引数で受け取った $id を表示
//    public function show($id) {
//        return $id;
//    }
    public function show($id) {
        //findorfail関数を表示
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
    //createメソッド
    public function create()
    {
        return view('articles.create');
    }

    //storeメソッド
    public function store(ArticleRequest $request) {
        //ArticleRequestでバリテーションルール設定しているため、ここには記載しない
       //Article::create($request->validated());
//        return redirect('articles')->with('message', '記事を追加しました。');
        Auth::user()->articles()->create($request->validated());
        return redirect()->route('articles.index')
            ->with('message', '記事を追加しました。');
    }

    //editメソッド
    public function edit($id) {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }
    //updateメソッド

    //update の方は、$request と $id を引数で受け取っている
    //$request は Form Request を継承した ArticleRequest クラスを使用
    public function update(ArticleRequest $request, $id) {
        $article = Article::findOrFail($id);

        $article->update($request->validated());
//        \Flash::success('記事を更新しました。');

//        return redirect(url('articles', [$article->id]))->with('message', '記事を更新しました。');
        return redirect()->route('articles.show', [$article->id])
            ->with('message', '記事を更新しました。');
    }

    /**
     * @param $id
     */
    public function destroy($id){
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('articles')->with('message', '記事を削除しました。');
//        return redirect()->route('articles.show', [$article->id])
//            ->with('message', '記事を削除しました。');

    }
}
