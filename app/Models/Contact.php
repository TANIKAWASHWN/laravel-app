<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Contact extends Model
{
    use HasFactory, Sortable;

    protected $fillable = ['name', 'tel', 'mail', 'title', 'content'];

    public $sortable = ['created_at', 'updated_at'];

}
