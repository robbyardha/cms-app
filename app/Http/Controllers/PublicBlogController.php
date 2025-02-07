<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicBlogController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::all();
        $query = Post::query();

        if ($request->has('tag') && $request->tag != '') {
            $query->whereHas('tags', function ($query) use ($request) {
                $query->where('name', $request->tag);
            });
        }
        $query->where('is_published', 1);

        $posts = $query->latest()->get();

        // return view('public-blog.blog.index', compact('posts', 'tags'));
        return view('public-blog.blog.blog-new', compact('posts', 'tags'));
    }

    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:1000'
        ]);

        $post = Post::findOrFail($postId);

        // $commentAdd = Comment::create([
        //     'post_id' => $post->id,
        //     'user_id' => Auth::id(),
        //     'comment' => $request->content,
        // ]);
        $post->comments()->create([
            'post_id' => $post->id,
            'user_id' => Auth::id(),
            'comment' => $request->content
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    public function storeLike($postId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to like this post.');
        }

        $post = Post::findOrFail($postId);
        $user = Auth::user();

        // Cek apakah user sudah memberi like pada post ini
        $like = $user->likes()->where('likeable_id', $post->id)->where('likeable_type', Post::class)->first();

        if ($like) {
            // Jika sudah like, lakukan unlike
            $like->delete();
            return back()->with('success', 'You unliked the post.');
        } else {
            // Jika belum like, lakukan like
            $user->likes()->create([
                'likeable_id' => $post->id,
                'likeable_type' => Post::class,
            ]);
            return back()->with('success', 'You liked the post.');
        }
    }

    public function show($slug)
    {
        $tags = Tag::all();
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('public-blog.blog.detail', compact('post', 'tags'));
        // return view('public-blog.blog.show', compact('post'));
    }
}
