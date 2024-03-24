<!DOCTYPE html>
<html>
<head>
    <title>メールアドレスの確認</title>
</head>
<body>
    <h1>メールアドレスの確認</h1>
    <p>以下のリンクをクリックして、メールアドレスを確認してください。</p>
    <a href="{{ route('verification.verify', ['id' => $user->id, 'hash' => hash('sha256', $user->email)]) }}">メールアドレスを確認</a>
</body>
</html>
