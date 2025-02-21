<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactRepository
{
    public function getContactList($limit, $use_paginate = false)
    {
        $contact_list_query = Contact::select('id', 'name', 'title', 'created_at', 'updated_at');

        if ($use_paginate) {
            return $contact_list_query->paginate($limit);
        } else {
            return $contact_list_query->limit($limit)->get();
        }
    }

    public function getContactDetail($id)
    {
        return Contact::select('id', 'name', 'mail', 'title', 'content')
            ->where('id', $id)
            ->first();
    }
}