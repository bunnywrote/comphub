<?php

class UrlHelper
{
    public static function categoryToUrl(int $id)
    {
        return "?type=category&id=".$id;
    }
}