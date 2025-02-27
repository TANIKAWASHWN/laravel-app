<tr>
    <td>{{ $contact_item->name }}</td>
    <td>{{ $contact_item->mail }}</td>
    <td>
        <a href="{{ route('contact.detail', ['id' => $contact_item->id]) }}"
            class="text-blue-500 font-semibold hover:text-blue-700 hover:underline transition duration-300 inline-block px-4 py-2 border border-blue-500 rounded-lg">
            詳細ページへ
        </a>
    </td>
</tr>
