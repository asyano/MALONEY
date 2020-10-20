<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
      protected $fillable = ['content','category_id' ];
      
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
