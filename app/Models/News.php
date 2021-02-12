<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //テーブル名
    protected $table = 'news';
    //可変項目(保存したい項目)
    protected $fillable =
    [
        'title',
        'text'
    ];
}

