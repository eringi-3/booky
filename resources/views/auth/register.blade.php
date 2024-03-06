<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
</head>
<body>
    <h1 style="color: #c154e3;">ユーザー登録</h1>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <!-- 名前の入力フィールド -->
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" required style="display: block; width: 15%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;"><br>

        <!-- メールアドレスの入力フィールド -->
        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required style="display: block; width: 25%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;"><br>
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <!-- パスワードの入力フィールド -->
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required style="display: block; width: 10%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;"><br>

        <!-- パスワード確認の入力フィールド -->
        <label for="password_confirmation">パスワード確認:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required style="display: block; width: 10%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;"><br>

        <!-- 送信ボタン -->
        <button type="submit" style="display: inline-block; padding: 10px 20px; border: 1px solid #ea950b; border-radius: 5px; text-decoration: none; color: #eb6767f4; background-color: #d2e1f3; width: 13%; font-size: 16px; margin-top: 30px;">登録</button><br>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </form>
</body>
</html>
