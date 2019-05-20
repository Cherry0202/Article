<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Blog</title>
    <!-- デフォルトCSS を追加 -->
    <link rel="stylesheet" href="/css/app.css">

    <!--  デフォルトJavaScript追加 -->
    <script src="/js/app.js" defer></script>
</head>
<body>
    {{-- ナビゲーションバーの Partial を使用 --}}
    @include('navbar')

    <div class="container py-4"> <!-- Bootstrap　左右に余白をつける  -->
        {{-- フラッシュメッセージの表示 --}}
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        {{-- コンテンツの表示 --}}
        @yield('content')
    </div>
</body>
</html>
