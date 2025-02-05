<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $table = "comments";
    protected $guarded = ["id"];
    protected $primaryKey = "id";

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public static function likeComment($id)
    {
        $comment = Comment::find($id);

        if ($comment && !$comment->likes()->where('user_id', auth()->id())->exists()) {
            $comment->likes()->create(['user_id' => auth()->id()]);
        }
    }
}
