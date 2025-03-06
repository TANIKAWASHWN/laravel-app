<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactRepository
{
    public function getContactList($limit, $use_paginate = false)
    {
        $contact_list_query = Contact::select('id', 'name', 'title', 'created_at', 'updated_at')
                                        ->sortable()
                                        ->orderBy('updated_at', 'desc');

        if ($use_paginate) {
            return $contact_list_query->paginate($limit);
        } else {
            return $contact_list_query->limit($limit)->get();
        }
    }

    public function getContactSearch($keyword = null)
    {
        $contact_search_query = Contact::select('id', 'name', 'mail');

        if (!empty($keyword)) {
            $contact_search_query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                      ->orWhere('mail', 'LIKE', "%{$keyword}%");
            });
        }
        return $contact_search_query;
    }

    public function getContactDetail($id)
    {
        return Contact::select('id', 'name', 'mail', 'title', 'content')
            ->where('id', $id)
            ->first();
    }
}
