<h1 style="color: #87a736;">変更画面</h1>
<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- タイトルの入力フィールド -->
    <input type="text" name="title" value="{{ $book->title }}" style="display: block; width: 50%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;"><br>

    <!-- 購入価格の入力フィールド -->
    <input type="number" name="purchase_price" value="{{ floor($book->purchase_price), 0}}" step="1" style="display: block; width: 20%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;"><br>
    <!-- 売却価格の入力フィールド -->
    <input type="number" name="selling_price" value="{{ floor($book->selling_price), 0 }}" step="1" style="display: block; width: 20%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;"><br>

    <!-- 日付の入力フィールド -->
    <input type="date" name="purchase_date" value="{{ $book->purchase_date }}" style="display: block; width: 20%; padding: 1em 0.5em; border: 1px solid #999; box-sizing: border-box; background: #f2f2f2; margin: 0.5em 0;"">
    <!-- 保存ボタン -->
    <button type="submit" style="display: inline-block; padding: 10px 20px; border: 1px solid #0b38ea; border-radius: 5px; text-decoration: none; color: #0b38ea; background-color: #f3ecd2; width: 13%; font-size: 16px; margin-top: 30px;">保存</button>
</form>
<button onclick="window.history.back()" class="btn btn-primary" style="display: inline-block; padding: 10px 20px; border: 1px solid #0b38ea; border-radius: 5px; text-decoration: none; color: #d42f2f; background-color: #9aa8ee; width: 13%; font-size: 16px; float: right; margin-right: 50px;">一覧画面へ</button>
