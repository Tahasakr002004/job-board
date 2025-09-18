<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('comment', function (Blueprint $table): void {
            // Drop the existing foreign key
            $table->dropForeign(['post_id']);

            // Re-add it with cascade delete (NO need to re-add column)
            $table->foreign('post_id')
                  ->references('id')
                  ->on('post')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('comment', function (Blueprint $table): void {
            // Drop cascade constraint
            $table->dropForeign(['post_id']);

            // Re-add normal constraint (without cascade)
            $table->foreign('post_id')
                  ->references('id')
                  ->on('post');
        });
    }
};
