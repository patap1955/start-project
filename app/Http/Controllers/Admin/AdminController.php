<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\YandexMetricaHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(YandexMetricaHelpers $yandex) {
        $today = $yandex->views(0);
        $week = $yandex->views(6);
        $month = $yandex->views(29);
        return view("admin.pages.index.index", compact("today", "week", "month"));
    }
}
