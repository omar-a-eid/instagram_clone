<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Post; // Import the Post model

class ProfilePosts extends Component
{
    public $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function render()
    {
        $user = User::find($this->userId);

        // Fetch posts with their associated media
        $posts = Post::with('media')->where('user_id', $this->userId)->where('type', 'post')->get();

        return view('livewire.profile.posts', compact('posts'));
    }
}
