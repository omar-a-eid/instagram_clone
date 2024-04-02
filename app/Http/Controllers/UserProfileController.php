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
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
