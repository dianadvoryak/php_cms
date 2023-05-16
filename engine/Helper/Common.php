<?php

namespace Engine\Helper;
class Common
{
    public function isPost()
    {
//        if($_SERVER['REQUEST_METHOD'] == 'POST'){
//            return true;
//        }
//        return false;

        return $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;
    }

    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public static function getPathUri()
    {
        $pathUri = $_SERVER['REQUEST_URI'];

        if($position = strpos($pathUri, '?')){
            $pathUri = substr($pathUri, 0, $position);
        }

        return $pathUri;
    }

}