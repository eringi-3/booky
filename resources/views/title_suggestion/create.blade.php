<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タイトル登録画面</title>
</head>
<body>
    <h1 style="color: #6e0555;">タイトル登録画面</h1>
    <form action="{{ route('title_suggestion.store')}}" method="POST">
        @csrf
        <!-- 本のタイトルの入力フィールド -->
        <label for="title">タイトル:</label>
        <input type="text" id="title" name="title" required style="display: block; width: 50%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;"><br>

        <!-- 種類の入力フィールド -->
        <label for="genre">種類:</label>
        <input type="text" id="genre" name="genre" required style="display: block; width: 20%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;"><br>

        <!-- 送信ボタン -->
        <button type="submit" style="display: inline-block; padding: 10px 20px; border: 1px solid #f11385; border-radius: 5px; text-decoration: none; color: #e89fd2; background-color: #f3ecd2; width: 13%; font-size: 16px; margin-top: 30px;">登 録</button>
    </form>
    <a href="{{ route('title_suggestion.index') }}" class="btn btn-primary" style="display: inline-block; padding: 10px 20px; border: 1px solid #007bff; border-radius: 5px; text-decoration: none; color: #007bff; background-color: #f3d8ec; float: right; margin-right: 50px;">一覧画面に進む</a>
    </html>
</body>
