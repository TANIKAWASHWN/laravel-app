<title>お問い合わせ内容の一覧</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="bg-gray-100 text-gray-900">

    <div class="max-w-7xl mx-auto py-12 px-6">

        <h1 class="text-3xl font-semibold text-center mb-8">お問い合わせ内容の一覧</h1>

        <div class="flex justify-center items-center py-4">
            <form action="{{ route('contact.search') }}" method="GET" class="w-full max-w-md bg-white p-4 rounded-lg shadow-md">
                @csrf
                <div class="mb-3">
                    <label for="keyword" class="block text-gray-700 text-sm font-semibold mb-2">検索キーワード</label>
                    <input type="text" name="keyword" id="keyword" placeholder="検索キーワードを入力" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                </div>
                <div class="flex justify-center">
                    <input type="submit" value="検索" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                </div>
            </form>
        </div>

        <table class="min-w-full table-auto bg-white border border-gray-300 shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">日付</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">お名前</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">タイトル</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">詳細</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">削除</th>
                </tr>
            </thead>
            <tbody>
                @include('components.list')
            </tbody>
        </table>

        <div class="mt-6 flex justify-center">
            {{ $contact_list->appends(request()->query())->links('components.pagination') }}
        </div>
    </div>
</div>
