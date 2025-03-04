<tr>
    <td>{{ $contact_item->name }}</td>
    <td>{{ $contact_item->mail }}</td>
    <td>
        <a href="{{ route('contact.detail', ['id' => $contact_item->id]) }}"
            class="text-blue-500 font-semibold hover:text-blue-700 hover:underline transition duration-300 inline-block px-4 py-2 border border-blue-500 rounded-lg">
            詳細ページへ
        </a>
    </td>
    <td>
        <form id="deleteForm{{ $contact_item->id }}" action="{{ route('contact.delete', ['id' => $contact_item->id]) }}" method="POST" style="margin: 0;">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="text-white font-semibold bg-red-500 hover:bg-red-700 rounded-lg px-4 py-2 border border-red-500 hover:border-red-700 transition duration-300">
                削除
            </button>
        </form>
    </td>
</tr>

{{-- jsファイルを要作成 --}}
<script>
    document.getElementById('deleteForm{{ $contact_item->id }}').addEventListener('submit', function(event) {
        if (!confirm('本当に削除してもよろしいですか？復元はできません！')) {
            event.preventDefault();
        }
    });
</script>
