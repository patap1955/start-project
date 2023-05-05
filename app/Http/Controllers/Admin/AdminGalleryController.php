<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends AdminController
{
    public function index() {
        $galleries = Gallery::all()->sortByDesc("id");
        return view("admin.pages.gallery.index", compact("galleries"));
    }

    public function create()
    {
        return view("admin.pages.gallery.create");
    }

    public function store(Request $request)
    {
        //dd($request->file('img'));
        //$file = time() . "_" . $request->file('img')->getClientOriginalName();
        $file = $request->file('img')->getClientOriginalName();
        $filePath = $request->file('img')->storeAs("uploads/portfolio", $file, "public");
        $gallery = Gallery::create(["img" => $filePath]);
        return response()->json($gallery);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'status_gallary' => 'boolean',
            'alt' => '',
        ]);
        if ($gallery->update($validated)) {
            return response()->json($gallery);
        } else {
            return response()->json(["error" => "Ошибка"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        try {
            Storage::disk("public")->delete($gallery->img);
            $id = $gallery->id;
            $gallery->delete();
            return response()->json(["success" => "ok", "id" => $id]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
