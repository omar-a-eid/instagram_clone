<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'image',
            'bio' => 'string|max:255',
            'gender' => 'string|in:male,female',
            'website' => 'max:255',
        ]);
        
        $user = new User();

        $user->image = $request->image;
        $user->bio = $request->bio;
        $user->gender = $request->gender;
        $user->website = $request->website;
        
        $user->save();
        
        return redirect()->route('profile.show', ['id' => $user->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $singleUser = User::findorfail($id);
        if ($singleUser->id != Auth::id()) { 
            abort(403, "you are not authorized"); 
        }
        return view('user_profile.show', ['user' => $singleUser]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        if ($user->id != Auth::id()) { 
            abort(403, "you are not authorized"); 
        } 
        return view('user_profile.edit', ['user' => $user]);
    }

    

    /**
     * Update the specified resource in storage.
     */


public function update(Request $request, $id)
{
    $request->validate([
        'website' => 'nullable|url|max:255',
        'bio' => 'nullable|string|max:255',
        'gender' => 'nullable|string|in:Male,Female',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $user = User::findOrFail($id);
    if ($user->id !== auth()->id()) { 
        abort(403, "You are not authorized"); 
    } 


    $user->website = $request->input('website');
    $user->bio = $request->input('bio');
    $user->gender = $request->input('gender');

    if ($request->hasFile('image') && $request->file('image')->isValid()) { 
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }

        // Store new profile photo
        $imagePath = $request->file('image')->store('users', ['disk' => 'public']); 
        $user->image = $imagePath;
    } 

    // Save changes to the user
    $user->save();

    return redirect()->route('profile.show', ['id' => $id]);
}

    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Get the number of people the user is following
    public function getFollowingCount($id)
    {
        $user = User::findOrFail($id);
        $followingCount = $user->followingCount();

        return $followingCount;
    }

    // Get the number of followers 
    public function getFollowersCount($id)
    {
        $user = User::findOrFail($id);
        $followersCount = $user->followersCount();

        return $followersCount;
    }


    public function followers($id) 
    { 
        // Find the user 
        $user = User::findOrFail($id); 
 
        // Fetch the followers 
        $followers = $user->followers()->get(); 
 
        // Pass followers data to the view 
        return view('user_profile.followers', compact('followers', 'user')); 
    }


    public function follow($followerId) 
    { 
        // Find the current authenticated user 
        $user = auth()->user(); 
 
        // Find the user to follow 
        $follower = User::findOrFail($followerId); 
 
        // Check if the user is not already following the follower 
        if (!$user->isFollowing($follower)) { 
            // Attach the follower to the user's following list 
            $user->following()->attach($follower); 
        } 
 
        // Redirect back or to any other page 
        return redirect()->back()->with('success', 'You have followed ' . $follower->name); 
    }

    public function unfollow($id) 
    { 
        $user = auth()->user(); 
        $follower = User::findOrFail($id); 
 
        // Call the following relationship as a method 
        $user->following()->detach($follower->id); 
 
        return redirect()->back()->with('status', 'You have unfollowed ' . $follower->name); 
    }






}
