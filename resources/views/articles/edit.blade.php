@extends('layout')

@section('content')
    <h1>Edit: {{ $article->title }}</h1>

    <hr/>
    {{--errors.form_errorsをインクルード　 Partial と呼ぶ--}}
    @include('errors.form_errors')

    {{--このページ内に記述--}}
    {{--@if ($errors->any())--}}
        {{--<ul class="alert alert-danger">--}}
            {{--@foreach ($errors->all() as $error)--}}
                {{--<li>{{ $error }}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--@endif--}}
    {{--form::modelに変更 $article の値をフォームに紐付ける為に Form::model を使用--}}
    {{--METHOD に PATCH を指定、url へは $article の idをパラメータとして引き渡す--}}
    {{--{!! Form::model($article, ['method' => 'PATCH', 'url' => ['articles', $article->id]]) !!}--}}
    {!! Form::model($article, ['method' => 'PATCH', 'route' => ['articles.show', $article->id]]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>
    {{--published_at の入力項目の初期値を date(‘Y-m-d’)から $article->publieshed_at の値に変更
    $article->published_at は Article クラスで日付ミューテーターを指定している為、参照すると Carbon クラスのインスタンスが返ってくる
    format()メソッドで文字列に変換して初期値に--}}
    <div class="form-group">
        {!! Form::label('published_at', 'Publish On:') !!}
        {!! Form::input('date', 'published_at', $article->published_at->format('Y-m-d'), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Edit Article', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

@endsection