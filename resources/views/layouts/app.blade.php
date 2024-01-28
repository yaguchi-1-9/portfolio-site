<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <header>
        <a href="{{ route('login') }}" class="btn btn-primary">ログイン</a>
        <a href="{{ route('register') }}" class="btn btn-primary">新規会員登録</a>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ today()->format('Y') }}</p>
    </footer>
</body>
</html>
