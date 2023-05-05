<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends AdminController
{
    public function error403() {
        return view("admin.pages.errors.403");
    }
}
