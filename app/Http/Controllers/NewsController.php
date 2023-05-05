<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index() {
        $news = News::all()->sortBy('id');
        return view('pages.news.index', compact('news'));
    }

    public function show(News $news) {
        return view('pages.news.show', compact('news'));
    }
}
