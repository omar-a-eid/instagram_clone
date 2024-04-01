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
        // Schema::table('users', function (Blueprint $table) {
        //     // Add foreign key column
        //     $table->unsignedBigInteger('saved_posts')->nullable();

        //     // Define foreign key constraint
        //     $table->foreign('saved_posts')
        //         ->references('id')
        //         ->on('posts')
        //         ->onDelete('set null');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
