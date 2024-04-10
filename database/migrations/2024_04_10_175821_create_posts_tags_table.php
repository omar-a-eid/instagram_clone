<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_id');
            $table->foreign('post_id')->references('id')->on('posts');

            $table->foreignId('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            
            $table->boolean('public')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_tags');
    }
};