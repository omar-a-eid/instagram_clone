<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['caption', 'user_id'];
   

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->hasMany(PostLike::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function post_media() {
        return $this->hasMany(PostMedia::class);
    }

    public function tags() {
        return $this->hasManyThrough(Tag::class, 'posts_tags');
    }
}