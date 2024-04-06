<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\On;

class Home extends Component
{
    public $posts;
    public $canLoadMore;
    public $perPageIncrements=5;
    public $perPage=10;


    function  mount() {
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

    function loadMore()  {
        // dd("here"); testing the scroll down
        if (!$this->canLoadMore) {
            return null;
        }
        #increment page
        $this->perPage += $this->perPageIncrements;
        #load posts
        $this->loadPosts();
    }
    function loadPosts()  {
        $this->posts = Post::with('comments.replies')
        ->latest()
        ->take($this->perPage)->get();
        $this->canLoadMore= (count($this->posts)>= $this->perPage);

    }

    public function render()
    {
        return view('livewire.home');
    }
}
