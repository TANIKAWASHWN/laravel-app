<x-app-layout>

    <title>送信完了</title>

    <div class="container mx-auto px-10 mt-10">

        <h1 class="text-3xl font-semibold text-blue-700">お問い合わせフォーム</h1>

        <h3 class="text-xl font-semibold text-blue-600 mt-2">送信完了</h3>

        <div class="bg-blue-100 border-t border-b border-blue-500 px-4 py-6" role="alert">
            <p class="font-bold">お問い合わせが送信されました。</p>
            <p class="text-sm">{{ $name }} さん、ありがとうございました。</p>
        </div>

        <div class="mt-4">
            <a href="{{ route('home') }}" class="px-6 py-3 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                トップページに戻る
            </a>
        </div>
    </div>
</x-app-layout>
