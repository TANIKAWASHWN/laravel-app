<tr>
    <td><time>{{ date('Y年m月d日H:i', strtotime($contact_item->updated_at)) }}</time></td>
    <td>{{ $contact_item->name }}</td>
    <td>{{ $contact_item->title }}</td>
    <td>
        <a href="{{ route('contact.detail', ['id' => $contact_item->id]) }}" class="text-blue-500 font-semibold hover:text-blue-700 hover:underline transition duration-300">
            詳細ページへ
        </a>
    </td>    
</tr>