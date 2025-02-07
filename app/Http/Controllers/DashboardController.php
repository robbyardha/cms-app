<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $draftCount = Post::where('is_published', '0')->count();
        $publishedCount = Post::where('is_published', '1')->count();
        $postPublishLikeComment = Post::getPostsWithLikesAndComments();

        $data = [
            'title' => 'Dashboard',
            'draftCount' => $draftCount,
            'publishedCount' => $publishedCount,
            'postPublishLikeComment' => $postPublishLikeComment,
        ];

        return view('dashboard.index', $data);
    }
}
