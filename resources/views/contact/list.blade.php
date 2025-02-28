<title>お問い合わせの一覧</title>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<div class="bg-gray-100 text-gray-900">

    <div class="max-w-7xl mx-auto py-12 px-6">

        <h1 class="text-3xl font-semibold text-center mb-8">お問い合わせ内容の一覧</h1>

        <button id="start-btn">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#000000"><path d="M480-415.33q-45.33 0-76.33-32.28t-31-78.39v-247.33q0-44.45 31.29-75.56 31.3-31.11 76-31.11 44.71 0 76.04 31.11 31.33 31.11 31.33 75.56V-526q0 46.11-31 78.39T480-415.33Zm0-232ZM446.67-120v-131.67q-105.34-12-176-90.33Q200-420.33 200-526h66.67q0 88.33 62.36 149.17Q391.38-316 479.86-316q88.47 0 150.97-60.83 62.5-60.84 62.5-149.17H760q0 105.67-70.67 184-70.66 78.33-176 90.33V-120h-66.66ZM480-482q17.67 0 29.17-12.83 11.5-12.84 11.5-31.17v-247.33q0-17-11.69-28.5-11.7-11.5-28.98-11.5t-28.98 11.5q-11.69 11.5-11.69 28.5V-526q0 18.33 11.5 31.17Q462.33-482 480-482Z"/></svg>
            （仮存在）
        </button>
            <br>
            <br>
            <br>
        <button id="stop-btn">stop（仮存在）</button>

        <div class="flex justify-center items-center py-4">
            <form action="{{ route('contact.search') }}" method="GET" class="w-full max-w-md bg-white p-4 rounded-lg shadow-md">
                @csrf
                <div class="mb-3">
                    <label for="keyword" class="block text-gray-700 text-sm font-semibold mb-2">検索キーワード</label>
                    <input type="text" name="keyword" id="keyword" placeholder="検索キーワードを入力" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#000000"><path d="M792-120.67 532.67-380q-30 25.33-69.64 39.67Q423.39-326 378.67-326q-108.44 0-183.56-75.17Q120-476.33 120-583.33t75.17-182.17q75.16-75.17 182.5-75.17 107.33 0 182.16 75.17 74.84 75.17 74.84 182.27 0 43.23-14 82.9-14 39.66-40.67 73l260 258.66-48 48Zm-414-272q79.17 0 134.58-55.83Q568-504.33 568-583.33q0-79-55.42-134.84Q457.17-774 378-774q-79.72 0-135.53 55.83-55.8 55.84-55.8 134.84t55.8 134.83q55.81 55.83 135.53 55.83Z"/></svg>
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

{{-- jsファイルを要作成 --}}
{{-- 参考　https://qiita.com/hmmrjn/items/4b77a86030ed0071f548 --}}
<script>
    const startBtn = document.querySelector('#start-btn');
    const stopBtn = document.querySelector('#stop-btn');
    const keywordInput = document.querySelector('#keyword');

    SpeechRecognition = webkitSpeechRecognition || SpeechRecognition;
    let recognition = new SpeechRecognition();

    recognition.lang = 'ja-JP';
    recognition.interimResults = true;
    recognition.continuous = false;

    let finalTranscript = ''; // 確定した(黒の)認識結果

    recognition.onresult = (event) => {
        let interimTranscript = ''; // 暫定(灰色)の認識結果
        for (let i = event.resultIndex; i < event.results.length; i++) {
        let transcript = event.results[i][0].transcript;
        if (event.results[i].isFinal) {
            finalTranscript += transcript;
        } else {
            interimTranscript = transcript;
        }
        }
        keywordInput.value = finalTranscript + interimTranscript;
    }

    startBtn.onclick = () => {
        recognition.start();
    }
    stopBtn.onclick = () => {
        recognition.stop();
    }
</script>
