<title>確認画面</title>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="container mx-auto px-10 py-10 bg-blue-50 rounded-lg shadow-lg">
    <!-- パンくずリスト -->
    <nav class="text-sm mb-6" aria-label="Breadcrumb">
        <ol class="list-none p-0 inline-flex">
            <li class="flex items-center">
                <a href="/" class="text-blue-600 hover:text-blue-800">ホーム</a>
                <svg class="h-5 w-auto text-blue-600 mx-2 my-auto" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M7.05 4.5a1 1 0 011.415 0L13 9l-4.535 4.5a1 1 0 11-1.415-1.415L10.293 9.5 7.05 6.415a1 1 0 010-1.415z" />
                </svg>
            </li>
            <li class="flex items-center">
                <a href="{{ route('contact.index') }}" class="text-blue-600 hover:text-blue-800" onclick="window.history.back(); return false;">お問い合わせフォーム</a>
                <svg class="h-5 w-auto text-blue-600 mx-2 my-auto" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M7.05 4.5a1 1 0 011.415 0L13 9l-4.535 4.5a1 1 0 11-1.415-1.415L10.293 9.5 7.05 6.415a1 1 0 010-1.415z" />
                </svg>
            </li>
            <li>
                <span class="text-gray-600">確認画面</span>
            </li>
        </ol>
    </nav>

    <h1 class="text-3xl font-semibold text-blue-700">お問い合わせフォーム</h1>

    <h3 class="text-xl font-semibold text-blue-600 mt-2">確認画面</h3>

    <form method="POST" action="{{ route('contact.thanks') }}">
        @csrf

        <div class="mb-8">
            <label class="block text-sm font-medium text-gray-700">お名前</label>
            <input type="hidden" name="name" value="{{ $name }}">
            <p class="mt-2 block w-full rounded-md border-gray-300 shadow-sm bg-white">{{ $name }}</p>
        </div>

        <div class="mb-8">
            <label class="block text-sm font-medium text-gray-700">電話番号</label>
            <input type="hidden" name="tel" value="{{ $tel }}">
            <p class="mt-2 block w-full rounded-md border-gray-300 shadow-sm bg-white">{{ $tel }}</p>
        </div>

        <div class="mb-8">
            <label class="block text-sm font-medium text-gray-700">メールアドレス</label>
            <input type="hidden" name="mail" value="{{ $mail }}">
            <p class="mt-2 block w-full rounded-md border-gray-300 shadow-sm bg-white">{{ $mail }}</p>
        </div>

        <h3 class="text-xl font-semibold text-blue-600 mt-8">お問い合わせ内容を確認してください</h3>

        <div class="mb-8">
            <label class="block text-sm font-medium text-gray-700">タイトル</label>
            <input type="hidden" name="title" value="{{ $title }}">
            <p class="mt-2 block w-full rounded-md border-gray-300 shadow-sm bg-white">{{ $title }}</p>
        </div>

        <div class="mb-8">
            <label class="block text-sm font-medium text-gray-700">お問い合わせ内容</label>
            <input type="hidden" name="content" value="{{ $content }}">
            <p class="mt-2 block w-full rounded-md border-gray-300 shadow-sm bg-white">{{ $content }}</p>
        </div>

        <div class="flex justify-between mt-4">
            <input type="submit" value="入力内容を確認する" class="inline-block bg-blue-500 text-white font-semibold text-lg py-3 px-6 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300">
            <a href="{{ route('contact.index') }}" class="px-3 py-3 bg-gray-200 text-gray-800 rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50" onclick="window.history.back(); return false;">
                入力内容を訂正する
            </a>
        </div>
    </form>
</div>
