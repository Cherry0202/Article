
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- ブランド表示 -->
        <a class="navbar-brand" href="{{ route('home') }}">My Blog</a>

        <!-- スマホやタブレットで表示した時のメニューボタン -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- メニュー -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
            {{-- ゲスト時の表示メニュー --}}
            @guest
                <!-- ログインしていない時のメニュー -->
                    <li class="nav-item">
                        {{--  リンク先にログインページヘのルートを指定  --}}
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        {{-- リンク先にユーザー登録ページヘのルートを指定 --}}
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
            @else
                    <!-- ドロップダウンメニュー -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{-- ログインユーザーの名前を表示 --}}
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            >
                                Logout
                            </a>

                            {{--CSRF対策--}}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>