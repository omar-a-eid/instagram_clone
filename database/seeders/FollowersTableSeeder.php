<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\FollowerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {

            $followedUsers = $users->random(100);

            $user->following()->attach($followedUsers);
        }
    }
}
