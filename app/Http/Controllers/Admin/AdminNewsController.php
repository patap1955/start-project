<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all()->sortByDesc("id");
        return view("admin.pages.news.index", compact("news"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.news.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
//        $path = "uploads/news/thumbs";
        $validate = $request->validated();
//        $newFileName = time() . "." . $validate["img"]->clientExtension();
//        $validate["img"] = $path . "/" .$newFileName;
        $validate["status_view"] = (isset($validate["status_view"])) ? true : false;
        if ($article = News::create($validate)) {
//            $request->file("img")->storeAs($path, $newFileName, "public");
            session()->flash('success', 'Новость "' . $article->title . '" успешно добавленна');
            return redirect()->route('news.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view("admin.pages.news.edit", compact("news"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        $path = "uploads/news/thumbs";
        $validate = $request->validated();
        if (isset($validate["img"])) {
            $newFileName = time() . "." . $validate["img"]->clientExtension();
            $validate["img"] = $path . "/" .$newFileName;
            $request->file("img")->storeAs($path, $newFileName, "public");
        }
        if (isset($validate["status_view"])) {
            $validate["status_view"] = true;
        } else {
            $validate["status_view"] = false;
        }
        $news->update($validate);
        session()->flash('success', 'Статья "' . $news->title . '" успешно обновленна');
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if ($news->img !== null) {
            Storage::disk("public")->delete($news->img);
        }
        session()->flash('success', 'Новость "' . $news->title . '" успешно удаленна');
        $news->delete();
        return redirect()->route('news.index');
    }
}
