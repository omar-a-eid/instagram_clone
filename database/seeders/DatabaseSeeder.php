<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Post;
use  App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Post::factory(12)->hasComments(rand(12,30))->create(['type'=>'reel']);
        Post::factory(12)->hasComments(rand(12,30))->create(['type'=>'post']);
        Comment::limit(50)->each(function($comment){
            $comment::factory(rand(1,5))->isReply($comment->commentable)->create(['parent_id'=>$comment->id]);
        });
    }
}
