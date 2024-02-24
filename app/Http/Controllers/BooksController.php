<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{

    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->input('title');
        $book->purchase_price = $request->input('purchase_price');
        $book->selling_price = $request->input('selling_price');
        $book->purchase_date = $request->input('purchase_date');
        $book->save();

        return redirect('/books'); // 登録後に一覧画面にリダイレクト
    }

    public function create()
    {
        // 本の登録フォームのビューを表示
        return view('books.create');
    }

    public function index()
    {
        // 本の一覧を取得
        $books = Book::all();

        return view('books.index', ['books' => $books]);
    }

    public function edit(Book $book)
    {
        // 編集画面のビューを表示
        return view('books.edit', compact('book'));
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books'); // 削除後に一覧画面にリダイレクト
    }

    public function update(Request $request, Book $book)
    {
        $book->update([
            'title' => $request->input('title'),
            'purchase_price' => $request->input('purchase_price'),
            'selling_price' => $request->input('selling_price'),
            'purchase_date' => $request->input('purchase_date'),
        ]);

        return redirect('/books'); // 編集後に一覧画面にリダイレクト
    }
}
