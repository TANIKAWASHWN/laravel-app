<h1>お問い合わせフォーム</h1>
<h3>入力画面</h3>

<form method="POST" action="{{ route('contact.confirm') }}">
    @csrf

    <div>
        <label for="name">お名前（必須）</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="例）田中太郎">
        @if ($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
        @endif
    </div>

    <div>
        <label for="tel">電話番号</label>
        <input type="tel" name="tel" id="tel" value="{{ old('tel') }}" placeholder="例）000-0000-0000">
        @if ($errors->has('tel'))
            <div class="error">{{ $errors->first('tel') }}</div>
        @endif
    </div>

    <div>
        <label for="mail">メールアドレス（必須）</label>
        <input type="email" name="mail" id="mail" value="{{ old('mail') }}" placeholder="例）example@gmail.com">
        @if ($errors->has('mail'))
            <div class="error">{{ $errors->first('mail') }}</div>
        @endif
    </div>

    <h3>お問い合わせ内容を入力してください</h3>

    <div>
        <label for="title">タイトル（必須）</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        @if ($errors->has('title'))
            <div class="error">{{ $errors->first('title') }}</div>
        @endif
    </div>

    <div>
        <label for="content">お問い合わせ内容（必須）</label>
        <textarea name="content" id="content">{{ old('content') }}</textarea>
        @if ($errors->has('content'))
            <div class="error">{{ $errors->first('content') }}</div>
        @endif
    </div>

    <div>
        <input type="submit" value="入力内容を確認する">
    </div>
</form>