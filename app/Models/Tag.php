<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $table = "tags";
    protected $guarded = ["id"];
    protected $primaryKey = "id";

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags');
    }

    public static function filterByTag($tagName)
    {
        $tag = self::where('name', $tagName)->first();
        return $tag ? $tag->posts : collect();
    }
}
