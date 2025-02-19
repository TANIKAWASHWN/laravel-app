<article>
    <h1>お問い合わせフォーム</h1>

    <form method="POST" action="{{ route('contact.thanks') }}">
    @csrf

    <h2>お客様の情報を確認してください</h2>
    
    <div class="form">
        <div class="form_title">
            お名前
        </div>
        <div class="form_input">
            <input type="hidden" name="name" value="{{ $name }}">
            {{ $name }}
        </div>
        
        <div class="form_title">
            メールアドレス
        </div>
        <div class="form_input">
            <input type="hidden" name="mail" value="{{ $mail }}">
            {{ $mail }}
        </div>
    </div>

    <h2>お問い合わせ内容を確認してください</h2>
    
    <div class="form">
        <div class="form_title">
            タイトル
        </div>
        <div class="form_input">
            <input type="hidden" name="title" value="{{ $title }}">
            {{ $title }}
        </div>
        
        <div class="form_title">
            お問い合わせ内容
        </div>
        <div class="form_input">
            <input type="hidden" name="content" value="{{ $content }}">
            {{ $content }}
        </div>
    </div>

    <div class="submit">
        <input type="submit" value="入力内容を送信する">
    </div>
    </form>
</article>