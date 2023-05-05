<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCertificateController extends AdminController
{
    public function index() {
        $galleries = Certificate::all()->sortByDesc("id");
        return view("admin.pages.certificates.index", compact("galleries"));
    }

    public function create()
    {
        return view("admin.pages.certificates.create");
    }

    public function store(Request $request)
    {
        $file = $request->file('img')->getClientOriginalName();
        $filePath = $request->file('img')->storeAs("uploads/certificates", $file, "public");
        $gallery = Certificate::create(["img" => $filePath]);
        return response()->json($gallery);
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validate([
            'status_gallary' => 'boolean',
            'link' => '',
        ]);
        if ($certificate->update($validated)) {
            return response()->json($certificate);
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
    public function destroy(Certificate $certificate)
    {
        try {
            Storage::disk("public")->delete($certificate->img);
            $id = $certificate->id;
            $certificate->delete();
            return response()->json(["success" => "ok", "id" => $id]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
