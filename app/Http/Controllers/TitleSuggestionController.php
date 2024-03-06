<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TitleSuggestion;
use App\Http\Requests\TitleSuggestionRequest;

class TitleSuggestionController extends Controller
{
    public function store(Request $request)
    {
        $TitleSuggestion = new TitleSuggestion();
        $TitleSuggestion->title = $request->input('title');
        $TitleSuggestion->genre = $request->input('genre');
        $TitleSuggestion->save();

        return redirect('/title_suggestion'); // 登録後に一覧画面にリダイレクト
    }

    public function create()
    {
        // タイトル登録フォームのビューを表示
        return view('title_suggestion.create');
    }

    public function index()
    {
        $title_suggestion = TitleSuggestion::orderBy('title')->get();
        return view('title_suggestion.index', ['title_suggestion' => $title_suggestion]);
    }

    public function destroy(TitleSuggestion $TitleSuggestion)
    {
        $TitleSuggestion->delete();
        return redirect('/title_suggestion'); // 削除後に一覧画面にリダイレクト
    }
}
