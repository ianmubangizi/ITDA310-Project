<?php


namespace Hospital\View;


class Routes
{
    protected static function get($location, $url, $view)
    {
        if (preg_match("($location)", $url)) {
            if (file_exists(__DIR__ . "/" . $view)) {
                include $view;
            }
        }
    }

    public static function getURI()
    {
        return $_SERVER['REQUEST_URI'];
    }
}