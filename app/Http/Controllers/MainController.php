<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $slider = News::first();
        $berita = News::where('id', '!=', $slider->id ? $slider->id : 1)->get();
        return view('pages.home.main', compact('slider', 'berita'));
    }

    public function dashboard()
    {
        return view('pages.dashboard.main');
    }
    public function history()
    {
        return view('pages.home.history');
    }
    public function informasi()
    {
        return view('pages.home.informasi');
    }
    public function visi_misi()
    {
        return view('pages.home.visi_misi');
    }
}
