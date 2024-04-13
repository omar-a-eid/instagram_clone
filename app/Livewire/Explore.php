<?php 

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Explore extends Component 
{

  #[On('closeModal')]
  function revertUrl()
  {
      $this->js("history.replaceState({},'','/explore')");
  }

  
  public function render() 
  {
      $loggedInUserId = Auth::user()->id;
      $posts = Post::where('user_id', '!=', $loggedInUserId)->limit(20)->get();
      return view("livewire.explore", ['posts' => $posts]);
  }
}