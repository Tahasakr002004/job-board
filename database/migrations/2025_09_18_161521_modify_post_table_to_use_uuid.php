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
        Schema::dropIfExists('post');
        Schema::create('post', function (Blueprint $table) {
            //
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('body');
            $table->string('author');
            $table->boolean('published');
            $table->timestamps(); // created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post', function (Blueprint $table) {
            //
            $table->id('id')->primary();
            $table->string('title');
            $table->string('body');
            $table->string('author');
            $table->boolean('published');
            $table->timestamps(); // created at and updated at
        });
    }
};
