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
    public function store(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'bio' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:Male,Female',
            'website' => 'nullable|max:255',
        ]);

        $user = User::findOrFail($id);
        if ($user->id !== auth()->id()) {
            abort(403, "You are not authorized");
        }

        // Update the user's profile data
        $user->bio = $request->input('bio');
        $user->gender = $request->input('gender');
        $user->website = $request->input('website');

        // Check if a new image file has been uploaded
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Delete the old profile image if it exists
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            // Store the new profile image
            $imagePath = $request->file('image')->store('users', ['disk' => 'public']);
            $user->image = $imagePath;
        }

        // Save the updated user profile
        $user->save();

        // Redirect to the user's profile show page
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
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
         ]);
     
         $user = User::findOrFail($id);
         if ($user->id !== auth()->id()) {
             abort(403, "You are not authorized");
         }
     
         // Update other fields
         $user->website = $request->input('website');
         $user->bio = $request->input('bio');
         $user->gender = $request->input('gender');
     
         // Handle image upload
         if ($request->hasFile('image') && $request->file('image')->isValid()) {
             // Delete previous image if exists
             if ($user->image) {
                 Storage::disk('public')->delete($user->image);
             }
     
             // Store new profile photo
             $imagePath = $request->file('image')->store('users', 'public');
             $user->image = $imagePath;
         }
     
         // Save changes to the user
         $user->save();
     
         return redirect()->route('profile.show', ['id' => $id]);
     }

     public function updateImage(Request $request, $id){
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $user = User::findOrFail($id);
        if ($user->id !== auth()->id()) {
            abort(403, "You are not authorized");
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
    
            // Store new profile photo
            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
   
    
        // Save changes to the user
        $user->save();
    
        return redirect()->route('profileEdit.edit', ['id' => $id]);

     }
    }
     
     




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->id !== auth()->id()) {
            abort(403, "You are not authorized");
        }
    
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
            $user->image = null;
            $user->save();
        }
    
        // Redirect back to the edit profile page or any other appropriate page
        return redirect()->back()->with('success', 'Profile photo removed successfully.');
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
        return view('user_profile.show', compact('user', 'followers'));
    }

    public function followings($id)
    {
        // Find the user 
        $user = User::findOrFail($id);

        // Fetch the followers 
        $followings = $user->following()->get();

        // Pass followers data to the view 
        return view('user_profile.show', compact('user', 'followings'));
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

    // public function searchFollowers(Request $request, $id)
    // {
    //     $query = $request->input('query');
    //     $user = User::findOrFail($id);
    //     $filteredFollowers = $user->followers()->where('name', 'like', '%' . $query . '%')->get();
    //     return response()->json(['followers' => $filteredFollowers]);
    // }

    // public function searchFollowings(Request $request, $id)
    // {
    //     $query = $request->input('query');
    //     $user = User::findOrFail($id);
    //     $filteredFollowers = $user->followings()->where('name', 'like', '%' . $query . '%')->get();
    //     return response()->json(['followings' => $filteredFollowers]);
    // }

}
