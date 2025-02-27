<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="container mx-auto px-10 mt-10">
    <!-- パンくずリスト -->
    <nav class="text-sm mb-4" aria-label="Breadcrumb">
        <ol class="list-none p-0 inline-flex">
            <li class="flex items-center">
                <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800">ホーム</a>
                <svg class="h-5 w-auto text-blue-600 mx-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M7.05 4.5a1 1 0 011.415 0L13 9l-4.535 4.5a1 1 0 11-1.415-1.415L10.293 9.5 7.05 6.415a1 1 0 010-1.415z" />
                </svg>
            </li>
            <li class="flex items-center">
                <a href="{{ route('contact.index') }}" class="text-blue-600 hover:text-blue-800">お問い合わせフォーム</a>
                <svg class="h-5 w-auto text-blue-600 mx-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M7.05 4.5a1 1 0 011.415 0L13 9l-4.535 4.5a1 1 0 11-1.415-1.415L10.293 9.5 7.05 6.415a1 1 0 010-1.415z" />
                </svg>
            </li>
            <li>
                <span class="text-gray-600">確認画面</span>
            </li>
        </ol>
    </nav>

    <h1 class="text-3xl font-semibold text-blue-700">お問い合わせフォーム</h1>

    <h3 class="text-xl font-semibold text-blue-600 mt-2">送信完了</h3>

    <div class="bg-blue-100 border-t border-b border-blue-500 px-4 py-6" role="alert">
        <p class="font-bold">お問い合わせが送信されました。</p>
        <p class="text-sm">{{ $name }}さん、ありがとうございました。</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('home') }}" class="px-6 py-3 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            トップページに戻る
        </a>
    </div>
</div>
