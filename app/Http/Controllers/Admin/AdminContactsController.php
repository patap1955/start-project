<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactsController extends AdminController
{
    public function index() {
        $contacts = Contact::all()->sortByDesc("id")->sortBy("status");
        return view("admin.pages.contacts.index", compact("contacts"));
    }

    public function completedStatus(Request $request, Contact $contact) {
        if ($contact->update(["status" => true])) {
            return response()->json(
                [
                    "success" => "ok",
                    "date" => $contact->updated_at->format('d-m-y H:i')
                ]);
        } else {
            return response()->json(["success" => "error"]);
        }

    }
}
