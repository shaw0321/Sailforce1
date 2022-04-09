<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'tag_id';
    
    // Userテーブルとの多対多リレーション
     public function tag_user() {
        return $this->belongsToMany('App\Models\User', 'user_tag','tag_id','user_id');
    }
    
    // postテーブルとの多対多リレーション
     public function tag_post() {
        return $this->belongsToMany('App\Models\Post');
    }
}
