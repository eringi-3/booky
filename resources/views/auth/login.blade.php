<div class="container">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1 style="background: #fffaf4;
        color: #3c66f0;
        border-bottom: solid 3px #ec43a6;
        padding: 0.5em; ">ログイン画面</h1>
        <input type="text" name="email" placeholder="メールアドレス" /style="height: 40px; width: 25%"><br>
        <p>
        <input type="password" name="password" placeholder="パスワード" /style="height: 40px"><br>
        <p>
        <button type="submit" style="display: inline-block; padding: 10px 20px; border: 1px solid #f50882; border-radius: 5px; text-decoration: none; color: #eb2da2; background-color: #cfe8f1; width: 13%; font-size: 16px; margin-top: 30px;">ログイン</button>
    </form>
    @if ($errors->has('message'))
    <div class="alert alert-danger">
        {{ $errors->first('message') }}
    </div>
    @endif
</div>

