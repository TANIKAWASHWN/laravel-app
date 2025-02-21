<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ内容の一覧</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h1>お問い合わせ内容の一覧</h1>
    <table>
        <tr>
            <th>日付</th>
            <th>お名前</th>
            <th>タイトル</th>
            <th>詳細</th>
        </tr>
        @include('components.list')
    </table>
    {{ $contact_list->appends(request()->query())->links('components.pagination') }}
</body>
</html>