<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Post;

class ProfilePosts extends Component
{
    public $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    // Method to load a specific post for a specific user
    public function loadPostForUser($postId)
    {
        $post = Post::with('media')->where('user_id', $this->userId)->where('id', $postId)->first();

        // Emit an event with the loaded post data
        $this->emit('postLoaded', $post);
    }


    public function render()
    {
        $user = User::find($this->userId);

        // Fetch posts with their associated media
        $posts = Post::with('media')->where('user_id', $this->userId)->where('type', 'post')->get();

        return view('livewire.profile.posts', compact('posts'));
    }
}
