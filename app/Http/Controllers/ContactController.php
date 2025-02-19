<?php

namespace App\Http\Controllers;

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
        ]);

        return view('contact.confirm', $attributes);
    }
    public function thanks(Request $request)
    {
        $attributes = $request->only(['name', 'tel', 'mail', 'title', 'content']);

        // Contact::create($attributes);

        return view('contact.thanks', $attributes);
    }
}
