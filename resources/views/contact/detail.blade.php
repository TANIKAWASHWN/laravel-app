<title>お問い合わせ詳細</title>

<h3>お問い合わせ詳細</h3>

<ul>
    <li>お名前:{{ $contact->name }}</li>
    <li>メールアドレス:{{ $contact->mail }}</li>
    <li>タイトル:{{ $contact->title }}</li>
    <li>お問い合わせ内容:{{ $contact->content }}<br /></li>
</ul>
    <form action="{{ route('contact.delete', ['id' => $contact->id]) }}" method="POST" onsubmit="return confirm('本当に削除しますか？')">
        @csrf
        @method('DELETE')
        <button type="submit" style="color: red;">削除</button>
    </form>

<br>
<a href="{{ route('home') }}" >TOPに戻る</a>
<br>
<a href="{{ route('contact.list') }}" >お問い合わせ一覧に戻る</a>