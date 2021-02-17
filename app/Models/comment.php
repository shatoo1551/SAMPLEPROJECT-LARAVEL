<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // //テーブル名
    // protected $table = 'comments';
    // //可変項目(保存したい項目)
    // protected $fillable =
    // [
    //     'article_id',
    //     'view_name',
    //     'message'
    // ];

    public function article()
    {
        return $this->belongsTo(article::class);
    }
}


