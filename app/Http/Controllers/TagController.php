<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function follow(Request $request, Tag $tag)
    {
        $request->user()->followedTags()->syncWithoutDetaching($tag->id);
        // $posts = $tag->posts()->with('tags')->get();
        // return view("livewire.tag", ['posts' => $posts, 'tag' => $tag]);
        return redirect()->back();

    }
}
