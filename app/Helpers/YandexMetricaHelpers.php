<?php

namespace App\Helpers;

use Alexusmai\YandexMetrika\YandexMetrika;

class YandexMetricaHelpers
{
    protected object $mertica;

    public function __construct() {
        $this->mertica = new YandexMetrika();
    }

    public function views(int $int) {
        return $this->calkViews($this->viewsToArray($int));
    }

    private function viewsToArray (int $int)
    {
        $views = [
            "visits" => [],
            "count_views" => [],
            "unic_visits" => []
        ];
        //dd($this->mertica->getVisitsViewsUsers($int));
        foreach ($this->mertica->getVisitsViewsUsers($int)->data["data"] as $key) {
            array_push($views["visits"], $key["metrics"][0]);
            array_push($views["count_views"], $key["metrics"][1]);
            array_push($views["unic_visits"], $key["metrics"][2]);
        }
        return $views;
    }

    private function calkViews(array $array) {
        $array["visits"] = (int)(array_sum($array["visits"]));
        $array["count_views"] = (int)(array_sum($array["count_views"]));
        $array["unic_visits"] = (int)(array_sum($array["unic_visits"]));

        return $array;
    }
}
