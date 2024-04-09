<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->id !== auth()->id()) {
            abort(403, "You are not authorized");
        }

        $user->bio = $request->input('bio');
        $user->gender = $request->input('gender');
        $user->website = $request->input('website');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            $imagePath = $request->file('image')->store('users', ['disk' => 'public']);
            $user->image = $imagePath;
        }

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
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

            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;
        }

        $user->save();

        return redirect()->route('profile.show', ['id' => $id]);
    }

    public function updateImage(Request $request, $id)
    {
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

            $imagePath = $request->file('image')->store('users', 'public');
            $user->image = $imagePath;

            $user->save();

            return redirect()->back();
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

        return redirect()->back();
    }

    public function getFollowingCount($id)
    {
        $user = User::findOrFail($id);
        $followingCount = $user->followingCount();

        return $followingCount;
    }

    public function getFollowersCount($id)
    {
        $user = User::findOrFail($id);
        $followersCount = $user->followersCount();

        return $followersCount;
    }

    //Returns actual followers
    public function followers($id)
    {
        $user = User::findOrFail($id);

        $followers = $user->followers()->get();

        return view('user_profile.show', compact('user', 'followers'));
    }

    //Returns the number of people the user is following
    public function followings($id)
    {
        $user = User::findOrFail($id);

        $followings = $user->following()->get();

        return view('user_profile.show', compact('user', 'followings'));
    }


    //Implements the follow button
    public function follow($followerId)
    {
        $user = auth()->user();

        $follower = User::findOrFail($followerId);

        if (!$user->isFollowing($follower)) {

            $user->following()->attach($follower);
        }

        return redirect()->back();
    }

    //Implements the unfollow button
    public function unfollow($id)
    {
        $user = auth()->user();
        $follower = User::findOrFail($id);

        $user->following()->detach($follower->id);

        return redirect()->back();
    }
}
