<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Overtrue\LaravelLike\Traits\Liker;
use Overtrue\LaravelFavorite\Traits\Favoriter;
use Overtrue\LaravelFollow\Traits\Follower;
use Overtrue\LaravelFollow\Traits\Followable;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use liker;
    use Favoriter;
    use Follower;
    use Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'userName',
        'image',
        'bio',
        'gender',
        'website'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    function posts():HasMany{
        return $this->hasMany(Post::class);
    }
    function comments() : HasMany {
        return $this->hasMany(Comment::class);
    }


    /* Methods handling relation between followers table and users table*/

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    /* Methods returning the number of followers and followings */
    public function followingCount()
    {
        return $this->following()->count();
    }

    public function followersCount()
    {
        return $this->followers()->count();
    }


    /*  Check if the authenticated user is following the given user.*/
    public function isFollowing($user)
    {
        return $this->following()->where('id', $user->id)->exists();
    }
}