<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{
    protected $contact_repository;

    public function __construct(ContactRepository $contact_repository)
    {
        $this->contact_repository = $contact_repository;
    }

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

    public function list()
    {
       $contact_list = $this->contact_repository->getContactList(limit:10, use_paginate: true);

       return view('contact.list', ['contact_list' => $contact_list]);
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $contact_query = $this->contact_repository->getContactSearch($keyword);

        $contact_search = $contact_query->paginate(10);

        return view('contact.search', ['contact_search' => $contact_search]);
    }

    public function detail($id)
    {
        $contact = $this->contact_repository->getContactDetail($id);
        if (is_null($contact)) {
            abort(404);
        }
        return view('contact.detail', ['contact' => $contact]);
    }

    public function delete($id)
    {
        $contact = Contact::find($id);

        $contact->delete();

        return redirect()->route('contact.list');
    }
}
