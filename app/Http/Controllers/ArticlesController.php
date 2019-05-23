<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
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
        //ソート
        $articles = Article::latest('published_at')->latest('created_at')
            ->published()
            ->get();
        return view('articles.index', compact('articles'));
    }
    //引数で受け取った $id を表示

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

    public function update(ArticleRequest $request, $id) {
        $article = Article::findOrFail($id);

        $article->update($request->validated());

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

    }
}
