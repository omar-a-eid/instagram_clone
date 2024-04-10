<?php 

namespace App\Livewire;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Attributes\On;
use Livewire\Component;

class TagController extends Component 
{
  public $name; 

  public function mount($name = null) 
  {
      $this->name = $name;
  }

  #[On('closeModal')]
  function revertUrl()
  {
    $this->redirect("/explore/tag/$this->name");
  }

  
  public function render() 
  {
      if (!$this->name) {
        return abort(404); 
      }
      
      $tag = Tag::where('name', $this->name)->firstOrFail();
      $posts = $tag->posts()->with('tags')->get();
      return view("livewire.tag", ['posts' => $posts, 'tag' => $tag]);
  }
}