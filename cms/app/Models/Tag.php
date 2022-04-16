<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Tag extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'tag_id';
    
    // Userテーブルとの多対多リレーション
     public function users() {
        return $this->belongsToMany('App\Models\User', 'user_tag','tag_id','user_id');
    }
    
    // postテーブルとの多対多リレーション
     public function posts() {
        return $this->belongsToMany('App\Models\Post');
    }
}
