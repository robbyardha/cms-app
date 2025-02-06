<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class TagController extends Controller
{
    public function getDataAjax()
    {
        $data = Tag::orderBy('name', 'asc');
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                return view('tag.action')->with('data', $data);
            })
            ->make(true);
    }
    public function index()
    {
        $data = [
            'title' => 'Tag'
        ];
        return view('tag.index', $data);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:tags,name|max:100',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Nama sudah terdaftar',
            'name.max' => 'Nama maksimal 100 karakter',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dataSave = Tag::create([
            'name' => $request->name,
        ]);

        return response()->json(['success' => 'Data saved successfully!'], 200);
    }

    public function edit($id)
    {
        $data = Tag::findOrFail($id);

        return response()->json([
            'result' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name_edit' => 'required|unique:tags,name,' . $id . '|max:100',
        ], [
            'name_edit.required' => 'Nama Wajib diisi',
            'name_edit.unique' => 'Nama sudah terdaftar',
            'name_edit.max' => 'Nama maksimal 100 karakter',

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {
            $client = Tag::findOrFail($id);

            $data = [
                'name' => $request->name_edit,
            ];

            $client->update($data);

            return response()->json(['success' => 'Data updated successfully!'], 200);
        }
    }

    public function delete($id)
    {
        $data = Tag::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Data deleted successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Data not found!'], 404);
        }
    }
}
