<?php


namespace Hospital\View\Core;

use Hospital\Domain\Singleton;

class Route extends Singleton
{
    private static $current = "";
    private static $views = "/app/src/View/templates/";

    protected function __construct()
    {
        parent::__construct();
    }

    public static function get($location, $url, $view)
    {
        if (preg_match("($location)", $url)) {
            $template = self::$views . $view;
            if (file_exists($template)) {
                include $template;
            }
        }
    }

    public static function get_url()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function add($page)
    {
        if (!isset($_SESSION['routes'][$page->name])) {
            $_SESSION['routes'][$page->name] = $page;
        }
    }

    public static function get_routes()
    {
        return $_SESSION['routes'];
    }

    /**
     * @param mixed $current
     */
    public static function set_current($current)
    {
        self::$current = $current;
    }

    /**
     * @return string
     */
    public static function current()
    {
        return self::$current;
    }

}