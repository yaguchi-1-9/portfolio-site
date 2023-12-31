<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規ブログ投稿</title>
    <link rel="stylesheet" href="{{ asset('css/blog/create.css') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body>
    <h1>新規ブログ投稿</h1>
    <form action="{{ route('blog.store') }}" method="post">
        @csrf
        <label for="title">タイトル:</label>
        <input type="text" id="title" name="title">
        <label for="description">内容:</label>
        <textarea id="description" name="description"></textarea>
        <button type="submit" class="btn btn-primary">投稿</button>
    </form>
</body>
</html>
