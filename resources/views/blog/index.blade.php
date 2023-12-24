<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ記事一覧</title>
    <link rel="stylesheet" href="{{ asset('css/blog/index.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <h1>ブログ記事一覧</h1>
    <div>
        <a href="{{ route('blog_create') }}" class="btn btn-primary">新規作成</a>
        @foreach ($blogContents as $post)
            <div style="margin-bottom: 20px;">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->description }}</p>
                <p>詳細を見る</p>
            </div>
        @endforeach
    </div>

    <!-- フッター -->
    <footer>
        <a href="{{ route('portfolio') }}">My Portfolio</a>
    </footer>
</body>
</html>
