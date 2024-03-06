<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録画面</title>
</head>
<body>
    <h1 style="color: #f11e72;">登録画面</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <!-- 日付の入力フィールド -->
        <label for="purchase_date">日付:</label>
        <input type="date" id="purchase_date" name="purchase_date" required style="display: block; width: 20%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;">

        <!-- 本のタイトルの入力フィールド -->
        <label for="title">タイトル:</label>
        <input type="text" id="book-title" id="book-title" name="title" style="display: block; width: 50%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;">

        <!-- 買った値段の入力フィールド -->
        <label for="purchase_price">買った値段:</label>
        <input type="number" id="purchase_price" name="purchase_price" required style="display: block; width: 20%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;"><br>

        <!-- 売れた値段の入力フィールド -->
        <label for="selling_price">売れた値段:</label>
        <input type="number" name="selling_price" style="display: block; width: 20%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;"><br>

        <!-- 送信ボタン -->
        <button type="submit" style="display: inline-block; padding: 10px 20px; border: 1px solid #ea950b; border-radius: 5px; text-decoration: none; color: #f5710c; background-color: #f3ecd2; width: 13%; font-size: 16px; margin-top: 30px;">登 録</button>
    </form>
    <a href="{{ route('logout') }}" class="btn btn-primary" style="display: inline-block; padding: 10px 20px; border: 1px solid #5161ed; border-radius: 5px; text-decoration: none; color: #d797c6; background-color: #a7d8ef; float: right; margin-right: 30px;">ログアウト</a>
    <a href="{{ route('books.index') }}" class="btn btn-primary" style="display: inline-block; padding: 10px 20px; border: 1px solid #007bff; border-radius: 5px; text-decoration: none; color: #007bff; background-color: #f3d8ec; float: right; margin-right: 100px;">一覧画面に進む</a>
    <a href="{{ route('login') }}" class="btn btn-primary" style="display: inline-block; padding: 10px 20px; border: 1px solid #26793a; border-radius: 5px; text-decoration: none; color: #26793a; background-color: #f9b16d; float: right; margin-right: 30px;">ログイン画面へ</a>
    </html>
</body>
