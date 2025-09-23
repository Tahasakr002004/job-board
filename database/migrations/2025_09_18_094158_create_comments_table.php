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
        Schema::create('comment', function (Blueprint $table) {
            $table->uuid('id')->primary();       // UUID primary key
            $table->uuid('post_id');             // UUID foreign key
            $table->text('content');
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('post')->cascadeOnDelete();
   });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
