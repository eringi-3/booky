<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            // ユーザー情報をデータベースに保存
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            DB::commit();

            // 登録後のリダイレクトなどを行う
            return redirect()->route('login')->with('success', 'ユーザーの登録が完了しました');
        } catch (\Exception $e) {
            DB::rollback();

            // 登録後のリダイレクトなどを行う
            return redirect()->route('register')->with('error', 'ユーザーの登録に失敗しました');
        }

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

    protected function validator(array $data)
    {
        return Validator::make($data, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);
    }
}
