<x-app-layout>

    <title>お問い合わせフォーム</title>

    <div class="container mx-auto px-10 py-10 bg-blue-50 rounded-lg shadow-lg">
        <!-- パンくずリスト -->
        <nav class="text-sm mb-6" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800">ホーム</a>
                    <svg class="h-5 w-auto text-blue-600 mx-2" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M7.05 4.5a1 1 0 011.415 0L13 9l-4.535 4.5a1 1 0 11-1.415-1.415L10.293 9.5 7.05 6.415a1 1 0 010-1.415z" />
                    </svg>
                </li>
                <li>
                    <span class="text-gray-600">お問い合わせフォーム</span>
                </li>
            </ol>
        </nav>

        <h1 class="text-3xl font-semibold text-blue-700">お問い合わせフォーム</h1>

            <div class="block text-base font-semibold text-gray-700">
                ■ 下記フォーマットにご記入いただき、「入力内容の確認」ボタンを押して内容をご確認のうえ、送信してください。<br>
                ■ お問い合わせの内容によっては、お時間を頂戴する場合がございます。
            </div>

        <h3 class="text-xl font-semibold text-blue-600 mt-2">入力画面</h3>

        <form method="POST" action="{{ route('contact.confirm') }}">
            @csrf

            <div class="mb-8">
                <label for="name" class="block text-sm font-medium text-gray-700">
                    <span>お名前</span>
                    <span class="bg-yellow-600 text-white font-bold py-1 px-2 text-xs">
                        必須
                    </span>
                </label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full py-2 rounded-md border-gray-300 shadow-sm" placeholder="例）田中太郎">
                @if ($errors->has('name'))
                    <div class="text-yellow-600 text-sm mt-1">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="mb-8">
                <label for="tel" class="block text-sm font-medium text-gray-700">
                    <span>電話番号</span>
                    <span class="bg-gray-300 text-gray-500 font-bold py-1 px-2 text-xs">
                        任意
                    </span>
                </label>
                <input type="tel" name="tel" id="tel" value="{{ old('tel') }}" class="mt-1 block w-full py-2 rounded-md border-gray-300 shadow-sm" placeholder="例）000-0000-0000">
                @if ($errors->has('tel'))
                    <div class="text-yellow-600 text-sm mt-1">{{ $errors->first('tel') }}</div>
                @endif
            </div>

            <div class="mb-8">
                <label for="mail" class="block text-sm font-medium text-gray-700">
                    <span>メールアドレス</span>
                    <span class="bg-yellow-600 text-white font-bold py-1 px-2 text-xs">
                        必須
                    </span>
                </label>
                <input type="email" name="mail" id="mail" value="{{ old('mail') }}" class="mt-1 block w-full py-2 rounded-md border-gray-300 shadow-sm" placeholder="例）example@gmail.com">
                @if ($errors->has('mail'))
                    <div class="text-yellow-600 text-sm mt-1">{{ $errors->first('mail') }}</div>
                @endif
            </div>

            <h3 class="text-xl font-semibold text-blue-600 mt-8">お問い合わせ内容を入力してください</h3>

            <div class="mb-8">
                <label for="title" class="block text-sm font-medium text-gray-700">
                    <span>タイトル</span>
                    <span class="bg-yellow-600 text-white font-bold py-1 px-2 text-xs">
                        必須
                    </span>
                </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full py-2 rounded-md border-gray-300 shadow-sm" placeholder="例）タイトルを入力してください。">
                @if ($errors->has('title'))
                    <div class="text-yellow-600 text-sm mt-1">{{ $errors->first('title') }}</div>
                @endif
            </div>

            <div class="mb-8">
                <label for="content" class="block text-sm font-medium text-gray-700">
                    <span>お問い合わせ内容</span>
                    <span class="bg-yellow-600 text-white font-bold py-1 px-2 text-xs">
                        必須
                    </span>
                </label>
                <textarea name="content" id="content" class="mt-1 block w-full py-2 rounded-md border-gray-300 shadow-sm"  placeholder="例）お問い合わせの内容をご入力ください。">{{ old('content') }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-yellow-600 text-sm mt-1">{{ $errors->first('content') }}</div>
                @endif
            </div>

            <div class="flex justify-between">
                <input type="submit" value="入力内容を確認する" class="inline-block bg-blue-500 text-white font-semibold text-lg py-3 px-6 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300">
                <a href="{{ route('home') }}" class="px-3 py-3 bg-gray-200 text-gray-800 rounded-md shadow-sm hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50">
                    お問い合わせをやめる
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
