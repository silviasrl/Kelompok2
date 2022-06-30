<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($request->ajax()) {
            $collection = News::where('title', 'LIKE', '%' . $request->keywords . '%')->paginate(10);

            return view('pages.news.list', compact('collection', 'user'));
        }
        return view('pages.news.main', compact('user'));
    }
    public function create()
    {
        return view('pages.news.input', ['data' => new News, 'userid' => Auth::user()->id]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'source' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'title' => 'required|unique:news,title',
            'body' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('source')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('source'),
                ]);
            } elseif ($errors->has('title')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('title'),
                ]);
            } elseif ($errors->has('body')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('body'),
                ]);
            } elseif ($errors->has('thumbnail')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('thumbnail'),
                ]);
            }
        }
        $data = new News;
        $data->source = $request->source;
        $data->title = $request->title;
        $data->body = $request->body;
        $data->created_by = $request->created_by;
        $file = $request->file('thumbnail');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $data->thumbnail = $filename;
        $file->move(public_path('/images/news'), $filename);
        $data->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Tersimpan',
        ]);
    }
    public function show(News $news)
    {
        return view('pages.news.show', ['data' => $news]);
    }
    public function edit(News $news)
    {
        return view('pages.news.input', ['data' => $news, 'userid' => Auth::user()->id]);
    }
    public function update(Request $request, News $news)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:news,title,' . $news->id,
            'body' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('title')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('title'),
                ]);
            } elseif ($errors->has('body')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('body'),
                ]);
            } elseif ($errors->has('thumbnail')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('thumbnail'),
                ]);
            }
        }

        $news->source = $request->source;
        $news->title = $request->title;
        $news->body = $request->body;
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $news->thumbnail = $filename;
            $file->move(public_path('/images/news'), $filename);
        }
        $news->update();

        return response()->json([
            'alert' => 'success',
            'message' => 'Terupdate',
        ]);
    }

    public function destroy(News $news)
    {
        $news->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Terhapus',
        ]);
    }
}
