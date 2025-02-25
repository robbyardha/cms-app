<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    public function getDataAjax()
    {
        $data = Post::with(['tags', 'comments'])
            ->orderBy('created_at', 'desc')
            ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('title', function ($data) {
                return $data->title ? $data->title : ' No Data';
            })
            ->addColumn('is_published', function ($data) {
                if ($data->is_published == 0) {
                    return "<h6> <span class='badge color-rose-500'>Belum Publish</span></h6>";
                }
                if ($data->is_published == 1) {
                    return "<h6> <span class='badge color-emerald-500'>Published</span></h6>";
                }
            })
            ->addColumn('created_by', function ($data) {
                return $data->created_by ? strtoupper($data->created_by) : ' No Data';
            })
            ->addColumn('action', function ($data) {
                return view('post.action')->with('data', $data);
            })
            ->rawColumns(["action", "is_published"])
            ->make(true);
    }
    public function index()
    {
        $data = [
            'title' => 'Post'
        ];
        return view('post.index', $data);
    }

    public function create(Request $request)
    {

        if ($request->isMethod("get")) {
            $tags = Tag::all();
            $data = [
                'title' => 'Create Post',
                'tags' => $tags
            ];
            return view('post.create', $data);
        }

        if ($request->isMethod("post")) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:200',
                'slug' => 'required|unique:posts,slug|max:200',
                'content' => 'required',
                'tags' => 'required|array|min:1',
            ], [
                'title.required' => 'Judul wajib diisi',
                'title.max' => 'Judul maksimal 200 karakter',

                'slug.required' => 'Slug wajib diisi',
                'slug.unique' => 'Slug sudah terdaftar',
                'slug.max' => 'Slug maksimal 200 karakter',

                'content.required' => 'Content wajib diisi',

                'tags.required' => 'Tag wajib dipilih',
                'tags.array' => 'Pilih tag dengan benar',
            ]);

            if ($validator->fails()) {
                return redirect("/cms/post/create")
                    ->withErrors($validator)
                    ->withInput();
            }




            DB::beginTransaction();
            try {
                $dataSave = Post::create([
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'content' => $request->content,
                    'created_by' => auth()->user()->name,
                ]);

                if ($request->has('tags')) {
                    $dataSave->tags()->attach($request->tags);
                }

                DB::commit();

                return redirect('/cms/post')
                    ->with('success', 'Post berhasil dibuat!, dan masih tahap peninjauan');
            } catch (\Exception $e) {
                DB::rollBack();

                return redirect("/cms/post")
                    ->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage())
                    ->withInput();
            }
        }

        if (!$request->isMethod("post") || !$request->isMethod("get")) {
            abort(404);
        }
    }

    public function edit($id)
    {
        $decryptId = Crypt::decrypt($id);
        $dataPost = Post::with('tags')->find($decryptId);
        $tags = Tag::all();
        $data = [
            'title' => 'Edit Post ' . $dataPost->title,
            'post' => $dataPost,
            'tags' => $tags,
        ];
        return view('post.edit', $data);
    }

    public function update(Request $request)
    {
        $decryptId = Crypt::decrypt($request->id);

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:200',
            'slug' => "required|unique:posts,slug,$decryptId|max:200",
            'content' => 'required',
            'tags' => 'required|array|min:1',
        ], [
            'title.required' => 'Judul wajib diisi',
            'title.max' => 'Judul maksimal 200 karakter',

            'slug.required' => 'Slug wajib diisi',
            'slug.unique' => 'Slug sudah terdaftar',
            'slug.max' => 'Slug maksimal 200 karakter',

            'content.required' => 'Content wajib diisi',

            'tags.required' => 'Tag wajib dipilih',
            'tags.array' => 'Pilih tag dengan benar',
        ]);

        if ($validator->fails()) {
            return redirect("/cms/post/edit/" . $request->id)
                ->withErrors($validator)
                ->withInput();
        }


        $postUpdate = Post::find($decryptId);

        if (!$postUpdate) {
            return redirect("/cms/post")
                ->with('error', 'Data tidak ditemukan!');
        }

        $postUpdate->title = $request->title;
        $postUpdate->slug = $request->slug;
        $postUpdate->content = $request->content;
        $postUpdate->updated_by = auth()->user()->name;

        try {;
            $postUpdate->save();

            if ($request->has('tags')) {
                $postUpdate->tags()->sync($request->tags);
            }

            return redirect('/cms/post')
                ->with('success', 'Post berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect("/cms/post")
                ->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage())
                ->withInput();
        }
    }


    public function delete($id)
    {
        $data = Post::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Data deleted successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Data not found!'], 404);
        }
    }

    public function publish($id)
    {
        $data = Post::find($id);
        if ($data) {
            $data->is_published = 1;
            $data->published_by = auth()->user()->name;
            $data->save();

            return response()->json(['success' => true, 'message' => 'Data published successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Data not found!'], 404);
        }
    }


    public function unpublish($id)
    {
        $data = Post::find($id);
        if ($data) {
            $data->is_published = 0;
            $data->published_by = auth()->user()->name;
            $data->save();

            return response()->json(['success' => true, 'message' => 'Data unpublished successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Data not found!'], 404);
        }
    }
}
