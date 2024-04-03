<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function followers() {
        return $this->belongsToMany(User::class, 'tags_followers');
    }

    // public function followers() {
    //     return $this->belongsToMany(User::class, 'tags_followers', 'tag_id', 'follower_id');
    // }
    
}
