<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
       protected $fillable = ['content','title','icon','color','before_post_id','first_post_flag'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
