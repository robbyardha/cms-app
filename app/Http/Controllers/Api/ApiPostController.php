<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiPostController extends Controller
{
    public function index(Request $request)
    {
        $api_key = $request->api_key;
        $currentApiKey = env('SECRET_KEY_APP');
        $validator = Validator::make($request->all(), [
            'api_key' => 'required',
        ], [
            'api_key.required' => "API Key wajib diisi",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi Error',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($api_key != $currentApiKey) {
            return response()->json([
                'status' => false,
                'message' => 'API Key Tidak Sesuai',
                'errors' => 'API Key Tidak Sesuai'
            ], 401);
        } else {
            $posts = Post::fetchAllPost();

            if (!$posts) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $posts
            ], 200);
        }
    }

    public function showCommentDetailPost(Request $request)
    {

        $api_key = $request->api_key;
        $currentApiKey = env('SECRET_KEY_APP');
        $validator = Validator::make($request->all(), [
            'api_key' => 'required',
            'post_id' => 'required',
        ], [
            'api_key.required' => "API Key wajib diisi",
            'post_id.required' => "Post Id wajib diisi",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi Error',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($api_key != $currentApiKey) {
            return response()->json([
                'status' => false,
                'message' => 'API Key Tidak Sesuai',
                'errors' => 'API Key Tidak Sesuai'
            ], 401);
        } else {
            $postId = $request->post_id;
            $comments = (new Post)->getCommentsForPost($postId);

            if (!$comments) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan'
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $comments
            ], 200);
        }
    }

    public function likePost(Request $request)
    {
        $api_key = $request->api_key;
        $currentApiKey = env('SECRET_KEY_APP');
        $validator = Validator::make($request->all(), [
            'api_key' => 'required',
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
        ], [
            'api_key.required' => "API Key wajib diisi",
            'post_id.required' => "Post Id wajib diisi",
            'user_id.required' => "User Id wajib diisi",
            'post_id.exists' => "Post tidak ditemukan",
            'user_id.exists' => "User tidak ditemukan",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi Error',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($api_key != $currentApiKey) {
            return response()->json([
                'status' => false,
                'message' => 'API Key Tidak Sesuai',
                'errors' => 'API Key Tidak Sesuai'
            ], 401);
        } else {

            $existingLike = Like::where('user_id', $request->user_id)
                ->where('likeable_type', Post::class)
                ->where('likeable_id', $request->post_id)
                ->first();
            if ($existingLike) {
                return response()->json([
                    'status' => false,
                    'message' => 'You already liked this post.',
                ], 400);
            }


            $like = new Like();
            $like->user_id = $request->user_id;
            $like->likeable_type = Post::class;
            $like->likeable_id = $request->post_id;
            $like->save();

            return response()->json([
                'status' => true,
                'message' => 'Post liked successfully.',
                'like_data' => $like
            ], 200);
        }
    }
    public function commentPost(Request $request)
    {
        $api_key = $request->api_key;
        $currentApiKey = env('SECRET_KEY_APP');
        $validator = Validator::make($request->all(), [
            'api_key' => 'required',
            'post_id' => 'required|exists:posts,id',
            'user_id' => 'required|exists:users,id',
            'comment' => 'required',
        ], [
            'api_key.required' => "API Key wajib diisi",
            'post_id.required' => "Post Id wajib diisi",
            'user_id.required' => "User Id wajib diisi",
            'post_id.exists' => "Post tidak ditemukan",
            'user_id.exists' => "User tidak ditemukan",
            'comment.required' => "Komentar wajib diisi",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi Error',
                'errors' => $validator->errors()
            ], 422);
        }

        if ($api_key != $currentApiKey) {
            return response()->json([
                'status' => false,
                'message' => 'API Key Tidak Sesuai',
                'errors' => 'API Key Tidak Sesuai'
            ], 401);
        } else {
            $postId = $request->post_id;
            $userId = $request->user_id;
            $commentRequest = $request->comment;
            $post = Post::find($postId);
            if (!$post) {
                return response()->json([
                    'status' => false,
                    'message' => 'Post not found.',
                ], 404);
            }

            $comment = new Comment();
            $comment->post_id = $postId;
            $comment->user_id = $userId;
            $comment->comment = $commentRequest;
            $comment->save();

            return response()->json([
                'status' => true,
                'message' => 'Comment added successfully.',
                'comment' => $comment,
            ], 200);
        }
    }
}
