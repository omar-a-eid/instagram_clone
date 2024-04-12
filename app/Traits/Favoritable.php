<?php

namespace app\Traits;

trait Favoriteable
{
    public function favorites()
    {
        return $this->morphMany('App\Models\Favorite', 'favoritable');
    }

    public function favorite($user = null)
    {
        $user = $user ?: auth()->user();

        if (!$this->isFavorited($user)) {
            return $this->favorites()->create(['user_id' => $user->id]);
        }
    }

    public function isFavorited($user = null)
    {
        $user = $user ?: auth()->user();

        return (bool) $this->favorites()
            ->where('user_id', $user->id)
            ->count();
    }

    public function unfavorite($user = null)
    {
        $user = $user ?: auth()->user();
        $this->favorites()->where('user_id', $user->id)->delete();
    }
    public function getFavoritesCountAttribute()
    {
        return $this->favorites()->count;
    }
}
