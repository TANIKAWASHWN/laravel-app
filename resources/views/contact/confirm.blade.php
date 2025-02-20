<h1>お問い合わせフォーム</h1>
<h3>確認画面</h3>

<form method="POST" action="{{ route('contact.thanks') }}">
    @csrf
    
    <div>
        <label>お名前</label>
        <input type="hidden" name="name" value="{{ $name }}">
        {{ $name }}
    </div>

    <div>
        <label>電話番号</label>
        <input type="hidden" name="tel" value="{{ $tel }}">
        {{ $tel }}
    </div>

    <div>
        <label>メールアドレス</label>
        <input type="hidden" name="mail" value="{{ $mail }}">
        {{ $mail }}
    </div>

    <h3>お問い合わせ内容を確認してください</h3>

    <div>
        <label>タイトル</label>
        <input type="hidden" name="title" value="{{ $title }}">
        {{ $title }}
    </div>

    <div>
        <label>お問い合わせ内容</label>
        <input type="hidden" name="content" value="{{ $content }}">
        {{ $content }}
    </div>

    <!-- 戻るボタン -->
    <button type="button" onclick="window.history.back();">戻る</button>

    <!-- 送信ボタン -->
    <input type="submit" name="btn_submit" value="入力内容を送信する">
</form>
