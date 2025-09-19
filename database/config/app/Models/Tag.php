<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
        use HasFactory;
 
      protected $table = 'tag';
    //
    protected $fillable = ['title']; // fields that can be updated
    protected $guarded = ['id']; // cannot be updated/assigned(readonly)
  public function tags(){
        return $this->belongsToMany(Post::class);
    }
}
