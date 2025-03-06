<x-app-layout>

    <title>お問い合わせ詳細</title>

    <div class="bg-gray-100 text-gray-900">
        <div class="max-w-4xl mx-auto py-12 px-6">
            <h3 class="text-3xl font-semibold text-center mb-8">お問い合わせ詳細</h3>

            <ul class="space-y-4">
                <li class="text-lg"><span class="font-semibold">お名前:</span> {{ $contact->name }}</li>
                <li class="text-lg"><span class="font-semibold">メールアドレス:</span> {{ $contact->mail }}</li>
                <li class="text-lg"><span class="font-semibold">タイトル:</span> {{ $contact->title }}</li>
                <li class="text-lg"><span class="font-semibold">お問い合わせ内容:</span> {{ $contact->content }}</li>
            </ul>

            <div class="mt-6 flex justify-center space-x-4">
                <a href="{{ route('home') }}"
                class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300 text-center">
                    トップページに戻る
                </a>
                <a href="{{ route('contact.list') }}"
                class="inline-block px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300 text-center">
                    お問い合わせ一覧に戻る
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
