<!-- resources/views/books/index.blade.php -->
<h1>本の一覧</h1>
<ul>
    @foreach ($books as $book)
        <li>
            {{ $book->title }} (購入価格: {{ $book->purchase_price }})
            @if ($book->selling_price)
                差額: {{ $book->difference }}
            @else
                売却価格未設定
            @endif
        </li>
    @endforeach
</ul>
