<?php

if (! function_exists('cropStr')) {
    function cropStr($str)
    {
        $stripTags = strip_tags($str, '<p><a><strong>');

        $newStr = mb_substr($stripTags, 0,77);

        echo $newStr . "...";
    }
}
