<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //テーブル名
    protected $books = 'books';

    //可変項目
    protected $fillable = [
        'title',
        'content'
    ];
}
