<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }
    public function confirm(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'tel' => ['nullable', 'numeric'],
            'mail' => ['required', 'email'],
            'title' => 'required',
            'content' => 'required'
        ], [
            'name.required' => '名前は必須項目です。',
            'tel.numeric' => '電話番号は数字で入力してください。',
            'mail.required' => 'メールアドレスは必須項目です。',
            'mail.email' => 'メールアドレスの形式が正しくありません。',
            'title.required' => 'タイトルは必須項目です。',
            'content.required' => '内容は必須項目です。',
        ]);

        return view('contact.confirm', $attributes);
    }
    public function thanks(Request $request)
    {
        
        $attributes = $request->only(['name', 'tel', 'mail', 'title', 'content']);

        Contact::create($attributes);

        return view('contact.thanks', $attributes);
        
    }
}
