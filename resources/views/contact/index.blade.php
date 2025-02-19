<article>
    <h1>お問い合わせフォーム</h1>
    <div class="step">
        <div class="step_bar current">お問い合わせ内容の入力</div>
    </div>

    <form method="POST" action="{{ route('contact.confirm') }}">
        @csrf
        
        <h2>お客様の情報を入力してください</h2>
        
        <div class="form-group">
            <label for="name">お名前 <span class="required">必須</span></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
            @if ($errors->has('name'))
                <div class="error">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="mail">メールアドレス <span class="required">必須</span></label>
            <input type="email" id="mail" name="mail" value="{{ old('mail') }}" class="form-control">
            @if ($errors->has('mail'))
                <div class="error">{{ $errors->first('mail') }}</div>
            @endif
        </div>

        <h2>お問い合わせ内容を入力してください</h2>

        <div class="form-group">
            <label for="title">タイトル <span class="required">必須</span></label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
            @if ($errors->has('title'))
                <div class="error">{{ $errors->first('title') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="content">お問い合わせ内容 <span class="required">必須</span></label>
            <textarea id="content" name="content" class="form-control">{{ old('content') }}</textarea>
            @if ($errors->has('content'))
                <div class="error">{{ $errors->first('content') }}</div>
            @endif
        </div>

        <div class="form-submit">
            <input type="submit" value="入力内容を確認する" class="btn btn-primary">
        </div>
    </form>
</article>