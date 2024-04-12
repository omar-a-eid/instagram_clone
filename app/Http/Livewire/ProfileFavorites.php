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
        $user = User::find($this->userId);

        // Fetch favorited posts with their associated media
        $favoritedPosts = $user->favorites()->with('post.media')->get();

        return view('livewire.profile.favorites', compact('favoritedPosts'));
    }
}
