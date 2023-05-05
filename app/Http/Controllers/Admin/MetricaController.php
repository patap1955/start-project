<?php

namespace App\Http\Controllers\Admin;

use Alexusmai\YandexMetrika\YandexMetrika;
use App\Helpers\YandexMetricaHelpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MetricaController extends AdminController
{
    public function index(YandexMetricaHelpers $yandex) {
        $today = $yandex->views(0);
        $week = $yandex->views(6);
        $month = $yandex->views(29);

        return view("admin.pages.metrica.index", compact("today", "week", "month"));
    }
}
