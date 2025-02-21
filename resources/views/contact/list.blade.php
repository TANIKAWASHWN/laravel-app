<title>お問い合わせ内容の一覧</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="bg-gray-100 text-gray-900">

    <div class="max-w-7xl mx-auto py-12 px-6">
        
        <h1 class="text-3xl font-semibold text-center mb-8">お問い合わせ内容の一覧</h1>

        <table class="min-w-full table-auto bg-white border border-gray-300 shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">日付</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">お名前</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">タイトル</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">詳細</th>
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