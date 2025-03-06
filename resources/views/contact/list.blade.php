<x-app-layout>

    <title>お問い合わせの一覧</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <div class="bg-gray-100 text-gray-900">

        <div class="max-w-7xl mx-auto py-12 px-6">

            <h1 class="text-3xl font-semibold text-center mb-8">お問い合わせ内容の一覧</h1>

            <div>
                @include('components.deleted-contact')
            </div>

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
                    <div class="flex justify-center">
                        <button id="start-btn" type="button" class="bg-blue-500 text-white rounded-full p-2 shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 ease-in-out mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#ffffff">
                                <path d="M480-415.33q-45.33 0-76.33-32.28t-31-78.39v-247.33q0-44.45 31.29-75.56 31.3-31.11 76-31.11 44.71 0 76.04 31.11 31.33 31.11 31.33 75.56V-526q0 46.11-31 78.39T480-415.33Zm0-232ZM446.67-120v-131.67q-105.34-12-176-90.33Q200-420.33 200-526h66.67q0 88.33 62.36 149.17Q391.38-316 479.86-316q88.47 0 150.97-60.83 62.5-60.84 62.5-149.17H760q0 105.67-70.67 184-70.66 78.33-176 90.33V-120h-66.66ZM480-482q17.67 0 29.17-12.83 11.5-12.84 11.5-31.17v-247.33q0-17-11.69-28.5-11.7-11.5-28.98-11.5t-28.98 11.5q-11.69 11.5-11.69 28.5V-526q0 18.33 11.5 31.17Q462.33-482 480-482Z"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            <table class="min-w-full table-auto bg-white border border-gray-300 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">@sortablelink('updated_at', '日付')</th>
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
</x-app-layout>

{{-- jsファイルを要作成 --}}
{{-- 参考　https://qiita.com/hmmrjn/items/4b77a86030ed0071f548 --}}
<script>
    const startBtn = document.querySelector('#start-btn');
    // const stopBtn = document.querySelector('#stop-btn');
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
    // stopBtn.onclick = () => {
    //     recognition.stop();
    // }


// ページがロードされた時にスクロール位置を復元
    window.addEventListener('load', function() {
    const scrollPosition = sessionStorage.getItem('scrollPosition');
    if (scrollPosition) {
        window.scrollTo(0, scrollPosition);  // 保存されたスクロール位置にスクロール
    }
    });
    // スクロールが変わったときにその位置を保存
    window.addEventListener('scroll', function() {
    const scrollPosition = window.scrollY;  // 現在のスクロール位置を取得
    sessionStorage.setItem('scrollPosition', scrollPosition);  // スクロール位置をsessionStorageに保存
    });
    
</script>