<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, Sluggable;

    protected $table = "posts";
    protected $guarded = ["id"];
    protected $primaryKey = "id";

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }


    public static function likePost($id)
    {
        $post = Post::find($id);

        if ($post && !$post->likes()->where('user_id', auth()->id())->exists()) {
            $post->likes()->create(['user_id' => auth()->id()]);
        }
    }

    public static function getPostsWithLikesAndComments($isPublished = true)
    {
        $query = DB::table('posts')
            ->leftJoin('likes', function ($join) {
                $join->on('posts.id', '=', 'likes.likeable_id')
                    ->where('likes.likeable_type', '=', 'App\Models\Post');
            })
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->select(
                DB::raw('ROW_NUMBER() OVER (ORDER BY posts.created_at DESC) as no'),
                'posts.id',
                'posts.title',
                DB::raw('COUNT(DISTINCT likes.id) as likes_count'),
                DB::raw('COUNT(DISTINCT comments.id) as comments_count')
            )
            ->groupBy('posts.id');

        if ($isPublished) {
            $query->where('posts.is_published', 1);
        }

        return $query->get();
    }


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
