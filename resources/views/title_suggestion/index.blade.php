<h2 style="color: #3d9e80;">一覧画面</h2>
<table border="1">
    <thead>
        <tr>
            <th width="20"></th>
            <th width="250">タイトル</th>
            <th width="100">種類</th>
            <th width="100"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($title_suggestion as $TitleSuggestion)
            <tr>
                <td style="text-align: center;">{{ $loop->iteration }}</td>
                <td style="text-align: center;">{{ $TitleSuggestion->title }}</td>
                <td style="text-align: center;">{{ $TitleSuggestion->genre }}</td>

                <td style="height: 20px;">
                    <!-- 削除ボタン -->
                    <form action="{{ route('title_suggestion.destroy', $TitleSuggestion->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="width: 100%; height: 100%; border: 1px solid rgb(241, 90, 63); background-color: #c2e5f7; color: rgb(241, 90, 63)">削除</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<p></p>
<a href="{{ route('title_suggestion.create') }}" class="btn btn-primary" style="display: inline-block; padding: 10px 20px; border: 1px solid #007bff; border-radius: 5px; text-decoration: none; color: #007bff;">登録画面に戻る</a>
