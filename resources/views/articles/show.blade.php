<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
@extends('layout')

    @include('flash::message')

    @section('content')

<h1>{{ $article->title }}</h1>

    <hr/>

    <article>
        <div class="body">{{ $article->body }}</div>
    </article>

    <br/>

    <div>
        {{-- ログインしている時だけ表示 --}}
        @auth
            <a href="{{ action('ArticlesController@edit', [$article->id]) }}" class="btn btn-primary">
                編集
            </a>
            <a href="{{ action('ArticlesController@destroy', [$article->id]) }}">
                {!! delete_form(['articles', $article->id]) !!}
            </a>
        @endauth
            <a href="{{ action('ArticlesController@index') }}" class="btn btn-secondary float-right">
                一覧へ戻る
            </a>
    </div>
@endsection
</body>
