<?php

namespace App\Livewire\Post;
use App\Models\Media;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Auth;


class Create extends ModalComponent
{
     use WithFileUploads;

    public $media=[];
    public $description;
    public $location;
    public $hide_like_view=false;
    public $allow_commenting=false;

    public static function modalMaxWidth(): string
    {
        return '4xl';
    }


    function submit()  {
        try {
            if(Auth::check() && Auth::user()->email_verified_at) {
                #validate
                $this->validate([
                    'media.*'=>'required|file|mimes:png,jpg,mp4,jpeg,mov|max:100000',
                    'allow_commenting'=>'boolean',
                    'hide_like_view'=>'boolean',
                ]);
                #determine if real or post
                $type= $this->getPostType($this->media);
                #create post
                $post = Post::create([
                    'user_id'=>auth()->user()->id,
                    'description'=>$this->description,
                    'location'=>$this->location,
                    'allow_commenting'=>$this->allow_commenting,
                    'hide_like_view'=>$this->hide_like_view,
                    'type'=>$type
                ]);
    
    
                #check for tags 
                $words = explode(' ', $this->description);
                foreach ($words as $word) {
                    if (strpos($word, '#') === 0) {
                        $tagName = strtolower(substr($word, 1));
                        $tag = Tag::firstOrCreate(['name' => $tagName]);
                        $post->tags()->attach($tag);
                    }
                }
    
    
                #add media
                foreach ($this->media as $key => $media) {
                    #get mime type
                    $mime = $this->getMime($media);
                    #save to storage
                    $path= $media->store('media','public');
                    $url= url(Storage::url($path));
                    #create media
                    Media::create([
                        'url'=>$url,
                        'mime'=>$mime,
                        'mediable_id'=>$post->id,
                        'mediable_type'=>Post::class
                    ]);
                    $this->reset();
                    $this->dispatch('close');
                    #dispatch event for post created
                    $this->dispatch('post-created',$post->id);
                }
            } else {
               throw new \Exception("You need to verify your email");
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error',  $e->getMessage());
        }

    }


    function getMime($media) : string {
        if (str()->contains($media->getMimeType(),'video')) {
            return 'video';
        } else {
            return 'image';
        }
    }

    function getPostType($media) :string {
        if (count($media)===1 && str()->contains($media[0]->getMimeType(),'video')) {
        return 'reel';
        } else {
        return 'post';
        }
    }

    // function checkTags() {
    //     $words = explode(' ', $this->description);
    //     $foundTags = [];
    //     $time = 0;
    
    //     foreach ($words as $word) {
    //         if (strpos($word, '#') === 0 && !in_array($word, $foundTags)) {
    //             $foundTags[] = $word;
    //             $time += 1;
    //             dd($time); // or dump($word);
    //         }
    //     }
    // }

    public function render()
    {
        return view('livewire.post.create');
    }
}