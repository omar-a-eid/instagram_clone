<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            'image' => 'image|mimes:jpeg,png',
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
        return view('user_profile.show', ['user' => $singleUser]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
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
    ]);

    $user = User::findOrFail($id);

    $user->website = $request->input('website');
    $user->bio = $request->input('bio');
    $user->gender = $request->input('gender');

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
}
