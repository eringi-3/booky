<h2 style="color: #3d9e80; text-align: center; font-family: 'Arial', sans-serif; font-size: 28px;">一覧画面</h2>
<p style="color: rgb(244, 46, 79); text-align: right; margin-right: 20px;">{{ $user->name }} さん</p>
@foreach ($booksByMonth as $month => $books)
    <h3>{{ $month }}</h3>
    <table border="1">
        <thead>
            <tr>
                <th>日付</th>
                <th width="250">タイトル</th>
                <th width="100">買った値段</th>
                <th width="100">売れた値段</th>
                <th width ="80">差額</th>
                <th></th>
                <th width="100"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td style="text-align: center;">
                        @if ($book->purchase_date)
                            {{ $book->purchase_date }}
                        @else
                            登録なし
                        @endif
                    </td>
                    <td style="text-align: center;">{{ $book->title }}</td>
                    <td style="text-align: right;">{{ number_format($book->purchase_price, 0) }}</td>
                    <td style="text-align: right;">{{ number_format($book->selling_price, 0) }}</td>
                    <td style="text-align: right;">{{ number_format($book->selling_price - $book->purchase_price, 0) }}</td>
                    <td style="height: 20px;">
                        <!-- 変更ボタン -->
                        <form action="{{ route('books.edit', $book->id) }}" method="GET">
                            @csrf
                            <button type="submit" style="width: 100%; height: 100%; border: 1px solid rgb(205, 144, 29); background-color: #b9f2ac; color: rgb(205, 144, 29)">変更</button>
                        </form>
                    </td>
                    <td>
                        <!-- 削除ボタン -->
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="width: 100%; height: 100%; border: 1px solid rgb(241, 90, 63); background-color: #c2e5f7; color: rgb(241, 90, 63)">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5"></td>
                <td>買った値段の合計</td>
                <td style="text-align: right; width: 17%;">{{ number_format($books->sum('purchase_price'), 0) }}</td>
            </tr>
            <tr>
                <td colspan="5"></td>
                <td>売れた値段の合計</td>
                <td style="text-align: right;">{{ number_format($books->sum('selling_price'), 0) }}</td>
            </tr>
            <tr>
                <td colspan="5"></td>
                <td>差額の合計</td>
                <td style="text-align: right;">{{ number_format($books->sum('selling_price') - $books->sum('purchase_price'), 0) }}</td>
            </tr>
        </tbody>
    </table>
@endforeach
<p></p>
<a href="{{ route('book.create') }}" class="btn btn-primary" style="display: inline-block; padding: 10px 20px; border: 1px solid #007bff; border-radius: 5px; text-decoration: none; color: #007bff;">登録画面に戻る</a>
