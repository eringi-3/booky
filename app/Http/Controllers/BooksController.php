<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{

    public function index()
    {
        $books = Book::all(); // すべての本を取得
        // 本の一覧を取得してビューに渡す処理
        return view('books.index', ['books' => $books]);
    }

    public function store(Request $request)
    {
    $book = new Book();
    $book->title = $request->input('title');
    $book->purchase_price = $request->input('purchase_price');
    $book->selling_price = $request->input('selling_price');

    // 差額を計算して保存
    $book->difference = $book->selling_price - $book->purchase_price;

    $book->save();

    return redirect('/books'); // 登録後に一覧画面にリダイレクト
    }
}
