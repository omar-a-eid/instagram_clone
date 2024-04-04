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
    public function store($id)
    {
        // get user data  
        $image = request() -> image; 
        $bio = request() -> bio; 
        $gender = request() -> gender; 
        $website = request() -> website;
 
        // update user data in database 
        $user = new User(); 
        $user -> image = $image; 
        $user -> bio = $bio; 
        $user -> gender = $gender; 
        $user -> website = $website;
        $user -> save(); 
 
        // redirection to profile.show 
        return to_route('profile.show', ['user' => $id]); 
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
        // Validate incoming request data
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming image is being uploaded
            'bio' => 'string|max:255',
            'gender' => 'string|in:male,female',
            'website' => 'max:255',
        ]);
    
        // Get user data
        $userData = [
            'bio' => $request->bio,
            'gender' => $request->gender,
            'website' => $request->website,
        ];
    
        // Check if image is uploaded
        if ($request->hasFile('image')) {
            // Store the uploaded image
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
    
            // Add image path to user data
            $userData['image'] = 'images/' . $imageName;
        }
    
        // Update existing user data in database
        $user = User::find($id);
        $user->update($userData);
        dd($userData);
        
        // Redirect to profile.show route with user id
        return redirect()->route('profile.show', ['user' => $id]);
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
