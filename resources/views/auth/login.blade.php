<div class="container">
    <form method="POST" action="{{ route('login') }}">
        @csrf <!-- CSRFトークン -->
        <h1 style="color: #1596c5;">ログイン画面</h1>
        <input type="text" name="email" placeholder="ユーザー名" /style="height: 30px; width: 20%"><br>
        <p>
        <input type="password" name="password" placeholder="パスワード" /style="height: 30px"><br>
        <p>
        <button type="submit">ログイン</button>
    </form>
</div>

