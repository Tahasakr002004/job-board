
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Remove duplicates first (SQLite syntax)
        DB::statement('DELETE FROM post_tag WHERE rowid NOT IN (
            SELECT MIN(rowid)
            FROM post_tag
            GROUP BY post_id, tag_id
        )');

        Schema::table('post_tag', function (Blueprint $table) {
            $table->unique(['post_id', 'tag_id']);
        });
    }

    public function down(): void
    {
        Schema::table('post_tag', function (Blueprint $table) {
            $table->dropUnique(['post_id', 'tag_id']);
        });
    }
};
