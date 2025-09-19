<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, HasUuids;
    protected $primaryKey = "id";  // default primary key
    protected $keyType = "string"; // UUIDs are strings
    public $incrementing = false;  // not auto-increment

    protected $table = 'comment';

    protected $fillable = ['author', 'content', 'post_id'];
    protected $guarded = ['id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
