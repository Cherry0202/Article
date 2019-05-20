
@extends('layout')

@section('content')
<h1>Write a New Article</h1>

<hr/>

{{-- エラーの表示 --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        {{-- エラーが複数ある場合を考慮してforeach --}}
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{{--直パス--}}
{{--{!! Form::open(['url' => 'articles']) !!}--}}
{{--名前指定--}}
{!! Form::open(['route' => 'articles.store']) !!}
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at', 'Publish On:') !!}
    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}
@endsection