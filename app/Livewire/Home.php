<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;

use Livewire\Component;
use Livewire\Attributes\On;

class Home extends Component
{
    public $posts;
    public $canLoadMore;
    public $perPageIncrements = 5;
    public $perPage = 10;


    function  mount()
    {
        // $this->posts = Post::with('comments')->latest()->get();
        // dd($this->posts);
        $this->loadPosts();
    }
    #[On('closeModal')]
    function revertUrl()
    {
        $this->js("history.replaceState({},'','/')");
    }

    #[On('post-created')]
    function postCreated($id)
    {
        $post = Post::find($id);
        $this->posts = $this->posts->prepend($post);
    }

    function loadMore()
    {
        // dd("here"); testing the scroll down
        if (!$this->canLoadMore) {
            return null;
        }
        #increment page
        $this->perPage += $this->perPageIncrements;
        #load posts
        $this->loadPosts();
    }
    function loadPosts()
    {
        $this->posts = Post::with('comments.replies')
            ->latest()
            ->take($this->perPage)->get();
        $this->canLoadMore = (count($this->posts) >= $this->perPage);
    }
    function toggleFollow(User $user)
    {
        abort_unless(auth()->check(), 401);
        auth()->user()->toggleFollow($user);
    }
    public function render()
    {
        $suggestedUsers = User::limit(5)->get();
        return view('livewire.home', ['suggestedUsers' => $suggestedUsers]);
    }

    public function getUserPosts()
    {
        $posts = $this->user->posts()->where('type', 'post')->get();
        return view('livewire.profile.home', data: ['posts' => $posts]);
    }
}
