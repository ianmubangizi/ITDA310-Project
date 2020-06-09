<?php

namespace Hospital\View\Core;

use Hospital\Domain\Singleton;

abstract class Page extends Singleton
{
    public $name;
    public $link;
    public $title;
    public $static_files;

    private $template;
    private $page_title = "BroadReach";

    protected function __construct($name, $link, $title, $template, $static_files = array())
    {
        $this->link = $link;
        $this->name = $name;
        $this->title = $title;
        $this->template = $template;
        $this->static_files = $static_files;
        $this->page_title = "$this->page_title - $title";
        parent::__construct();
    }

    public function render($location)
    {
        Route::set_current($this->name);
        Route::get($location, Route::get_url(), $this->template);
    }

    public static function render_not_found($location)
    {
        Route::get($location, Route::get_url(), "404.php");
    }
}


