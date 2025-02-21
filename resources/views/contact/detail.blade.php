<title>お問い合わせ詳細</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="bg-gray-100 text-gray-900">
    <div class="max-w-4xl mx-auto py-12 px-6">
        <h3 class="text-3xl font-semibold text-center mb-8">お問い合わせ詳細</h3>

        <ul class="space-y-4">
            <li class="text-lg"><span class="font-semibold">お名前:</span> {{ $contact->name }}</li>
            <li class="text-lg"><span class="font-semibold">メールアドレス:</span> {{ $contact->mail }}</li>
            <li class="text-lg"><span class="font-semibold">タイトル:</span> {{ $contact->title }}</li>
            <li class="text-lg"><span class="font-semibold">お問い合わせ内容:</span> {{ $contact->content }}</li>
        </ul>

        <!-- 削除ボタン -->
        <div class="mt-8 flex justify-center space-x-4">
            <!-- 背景色をPHP変数で設定 -->
            @php
                $backgroundColor = 'bg-blue-500'; // 任意の色を指定、変数で設定
            @endphp

            <form id="deleteForm" action="{{ route('contact.delete', ['id' => $contact->id]) }}" method="POST">
                @csrf
                @method('DELETE')

                <!-- 削除ボタン -->
                <button type="button" id="deleteBtn" class="{{ $backgroundColor }} text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300">
                    削除
                </button>
            </form>
        </div>

        <!-- カスタムモーダル -->
        <div id="confirmationModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full">
                <div class="flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#F19E39">
                        <path d="m345.33-60-76-129.33-148.66-31.34 16-147.33L40-480l96.67-111.33-16-147.34L269.33-770l76-130L480-839.33 614.67-900l76.66 130 148 31.33-16 147.34L920-480l-96.67 112 16 147.33-148 31.34L614.67-60 480-120.67 345.33-60Zm29.34-86.67L480-191.33l108 44.66 63.33-98.66L766-274l-11.33-116.67L833.33-480l-78.66-91.33L766-688l-114.67-26.67L586-813.33l-106 44.66-108-44.66-63.33 98.66L194-688l11.33 116.67L126.67-480l78.66 89.33L194-272l114.67 26.67 66 98.66ZM480-480Zm0 200q15 0 25.17-10.17 10.16-10.16 10.16-25.16t-10.16-25.17Q495-350.67 480-350.67q-15 0-25.17 10.17-10.16 10.17-10.16 25.17 0 15 10.16 25.16Q465-280 480-280Zm-31.33-155.33h66.66V-684h-66.66v248.67Z"/>
                    </svg>
                    <h1 class="text-xl font-semibold text-red-700 mr-2">ATTENTION</h1>
                </div>
                
                <p class="text-red-700 text-lg mb-4 text-center">
                    {{ $contact->name }}さんのお問い合わせ<br>
                    本当に削除しますか？<br>
                    削除は元に戻せません。<br>
                    もう一度冷静に確認してください！
                </p>
                
                <div class="flex justify-center space-x-4">
                    <!-- 削除ボタン -->
                    <button onclick="document.getElementById('deleteForm').submit();" class="bg-red-600 text-white py-2 px-4 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-300">
                        削除
                    </button>
                    <!-- キャンセルボタン -->
                    <button onclick="closeModal()" class="bg-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-400 focus:outline-none transition duration-300">
                        キャンセル
                    </button>
                </div>
            </div>
        </div>

        <script>
            // モーダルを表示する関数
            function showModal() {
                document.getElementById("confirmationModal").classList.remove('hidden');
            }
            // モーダルを閉じる関数
            function closeModal() {
                document.getElementById("confirmationModal").classList.add('hidden');
            }
            // 削除ボタンのクリックイベントをリッスンしてモーダルを表示
            document.getElementById('deleteBtn').addEventListener('click', function() {
                showModal();
            });
        </script>

        <div class="mt-6 flex justify-center space-x-4">
            <a href="{{ route('home') }}" class="text-blue-500 hover:text-blue-700 font-semibold hover:underline transition duration-300">
                トップページに戻る
            </a>
            <a href="{{ route('contact.list') }}" class="text-blue-500 hover:text-blue-700 font-semibold hover:underline transition duration-300">
                お問い合わせ一覧に戻る
            </a>
        </div>
    </div>
</div>
