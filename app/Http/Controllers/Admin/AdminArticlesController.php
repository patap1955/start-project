<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminArticlesController extends AdminController
{
    public function index()
    {
        $articles = Article::all()->sortByDesc("id");
        return view("admin.pages.articles.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.articles.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $path = "uploads/articles/thumbs";
        $validate = $request->validated();
        $newFileName = time() . "." . $validate["img"]->clientExtension();
        $validate["img"] = $path . "/" .$newFileName;
        $validate["status_view"] = ($validate["status_view"]) ? true : false;
        if ($article = Article::create($validate)) {
            $request->file("img")->storeAs($path, $newFileName, "public");
            session()->flash('success', 'Статья "' . $article->title . '" успешно добавленна');
            return redirect()->route('article.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view("admin.pages.articles.edit", compact("article"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $path = "uploads/articles/thumbs";
        $validate = $request->validated();
        if (isset($validate["img"])) {
            $newFileName = time() . "." . $validate["img"]->clientExtension();
            $validate["img"] = $path . "/" .$newFileName;
            $request->file("img")->storeAs($path, $newFileName, "public");
        }
        $validate["status_view"] = ($validate["status_view"]) ? true : false;
        $article->update($validate);
        session()->flash('success', 'Статья "' . $article->title . '" успешно обновленна');
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ($article->img !== null) {
            Storage::disk("public")->delete($article->img);
        }
        session()->flash('success', 'Статья "' . $article->title . '" успешно удаленна');
        $article->delete();
        return redirect()->route('article.index');
    }
}
