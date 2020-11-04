<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word_category extends Model
{
    protected $fillable = ['cate_1_name','cate_2_name','cate_3_name','cate_4_name'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
