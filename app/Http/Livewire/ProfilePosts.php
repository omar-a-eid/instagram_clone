<?php

// app/Http/Livewire/ProfilePosts.php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

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
        $posts = $user->posts()->where('type', 'post')->get();

        return view('livewire.profile.posts', compact('posts'));
    }
}
