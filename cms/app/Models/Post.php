<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'post_id';

// Userテーブルとのリレーション （主テーブル側）
public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'user_id');
    }
// Userテーブルとの多対多リレーション
     public function favo_user() {
        return $this->belongsToMany('App\Models\User');
    }
    
    // tagテーブルとの多対多リレーション
     public function tags() {
        return $this->belongsToMany('App\Models\Tag');
    }

}
