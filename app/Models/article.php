<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // //テーブル名
    // protected $table = 'articles';
    // //可変項目(保存したい項目)
    // protected $fillable =
    // [
    //     'title',
    //     'text'
    // ];

    public function comments()
    {
        return $this->hasMany(comment::class);
    }
}

