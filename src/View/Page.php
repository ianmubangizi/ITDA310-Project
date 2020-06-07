<?php

namespace Hospital\View;

abstract class Page extends Routes
{
    private $page_name;
    protected static $template;
    private static $styles = ["main.css"];
    private static $page_title = "BroadReach -";

    public function __construct($name, $template)
    {
        $this->page_name = $name;
        self::$template = $template;
        self::$page_title = self::$page_title . " " . $name;
    }

    public static function getTitle()
    {
        return self::$page_title;
    }

    /**
     * @return string[]
     */
    public static function getStyles()
    {
        $links = [];
        foreach (self::$styles as $css_file) {
            array_push($links, "<link rel=\"stylesheet\" href=\"/static/css/$css_file\">");
        }
        return $links;
    }

    public function render($location){
        self::get($location, Routes::getURI(), self::$template);
    }

    public static function render_not_found($location){
        self::get($location, Routes::getURI(), "templates/404.php");
    }

}


