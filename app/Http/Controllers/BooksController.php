<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\TitleSuggestion;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BooksController extends Controller
{

    public function store(Request $request)
    {
        $user = Auth::user();
        $book = new Book();
        $book->title = $request->input('title');
        $book->purchase_price = $request->input('purchase_price');
        $book->selling_price = $request->input('selling_price');
        $book->purchase_date = $request->input('purchase_date');
        $book->user_id = $user->id;
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
        $books = [];
    if (Auth::check()) {
        $user = Auth::user();
        $books = $user->books()->orderBy('purchase_date')->get();
        $booksByMonth = $books->groupBy(function ($book) {
            return Carbon::parse($book->purchase_date)->format('Y-m');
        });
    } else {
        return redirect('/login');
    }
        return view('books.index', ['booksByMonth' => $booksByMonth, 'user' => $user]);

    }

    public function getTitleSuggestions(Request $request)
    {
        $title = $request->input('title');
        $suggestions = TitleSuggestion::where('title', 'like', $title.'%')->pluck('title');
        return response()->json($suggestions);
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
