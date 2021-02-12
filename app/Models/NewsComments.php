<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsComments extends Model
{
    //テーブル名
    protected $table = 'news-comments';
    //可変項目(保存したい項目)
    protected $fillable =
    [
        'newsnumber',
        'view_name',
        'message'
    ];
}


