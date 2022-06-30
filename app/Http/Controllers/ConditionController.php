<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ConditionController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($request->ajax()) {
            $collection = Condition::where('title', 'LIKE', '%' . $request->keywords . '%')->paginate(10);
            return view('pages.condition.list', compact('collection', 'user'));
        }
        return view('pages.condition.main', compact('user'));
    }
    public function create()
    {
        return view('pages.condition.input', ['data' => new Condition, 'user' => Auth::user()]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:conditions,title',
            'body' => 'required',
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
            }
        }
        $data = new Condition;
        $data->title = $request->title;
        $data->body = $request->body;
        $data->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Tersimpan',
        ]);
    }
    public function show(Condition $condition)
    {
        //
    }
    public function edit(Condition $condition)
    {
        return view('pages.condition.input', ['data' => $condition, 'user' => Auth::user()]);
    }
    public function update(Request $request, Condition $condition)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:conditions,title,' . $condition->id,
            'body' => 'required',
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
            }
        }
        $condition->title = $request->title;
        $condition->body = $request->body;
        $condition->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Terupdate',
        ]);
    }
    public function destroy(Condition $condition)
    {
        $condition->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Terhapus',
        ]);
    }
}
