<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="/css/app.css">

    <script src="/js/app.js" defer></script>
</head>
<body>
    @include('navbar')

    <div class="container py-4">
        {{-- フラッシュメッセージの表示 --}}
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        {{-- コンテンツの表示 --}}
        @yield('content')
    </div>
</body>
</html>
