<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
</head>
<body>
    <h1>ユーザー登録</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf <!-- CSRFトークンを追加 -->

        <!-- メールアドレスの入力フィールド -->
        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required>

        <!-- パスワードの入力フィールド -->
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required>

        <!-- パスワード確認の入力フィールド -->
        <label for="password_confirmation">パスワード確認:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <!-- 送信ボタン -->
        <button type="submit">登録</button>
    </form>
</body>
</html>
