<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // バリデーション: 入力データの検証
        $request->validate([
           'email' => 'required|email|unique:users', // メールアドレスは必須で一意である必要があります
           'password' => 'required|min:6|confirmed', // パスワードは必須で6文字以上である必要があります
        ]);

        // ユーザー情報をデータベースに保存
        $user = new User();
        $user->name = 'abcd';
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // パスワードをハッシュ化して保存
        $user->save();

        //登録後のリダイレクト先を設定
        return redirect()->route('login');
    }

    public function showRegisterForm()
    {
        return view('auth.register'); // ユーザー登録フォームのビューを表示
    }

    public function loginForm()
    {
        return view('auth.login'); // ログインフォームのビューを表示
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 認証に成功した場合の処理
            return redirect()->route('books.create');
        } else {
            // 認証に失敗した場合の処理
            return back()->withErrors(['message' => 'ログインに失敗しました。']);
        }
    }
}
