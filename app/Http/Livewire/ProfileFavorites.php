<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;

class ProfileFavorites extends Component
{
    public $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function render()
    {
        // Find the user
        $user = User::find($this->userId);

        // Fetch favorited posts with their associated media
        $favoritedPosts = Post::whereIn('id', $user->favorites()->pluck('favoriteable_id'))
            ->with('media')
            ->get();

        return view('livewire.profile.favorites', compact('favoritedPosts'));
    }
}
