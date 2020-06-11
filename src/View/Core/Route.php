<?php


namespace Hospital\View\Core;

use Hospital\Domain\Singleton;

class Route extends Singleton implements Handler
{
    private $current = null;
    private $handlers = array();

    protected function __construct()
    {
        parent::__construct();
    }

    public static function get($location, $url, $view)
    {
        if (preg_match("($location)", $url)) {
            $template = dirname(__DIR__) . "/templates/" . $view;
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
        return $this;
    }

    public function add_handler($handler)
    {
        array_push($this->handlers, $handler);
        return $this;
    }

    public static function get_routes()
    {
        return $_SESSION['routes'];
    }

    public function set_current($current)
    {
        $this->current = $current;
    }

    public function current()
    {
        return $this->current;
    }

    public function handle_get($request)
    {
        foreach ($this->handlers as $handler) {
            $handler->handle_get($request);
        }
    }

    public function handle_post($request)
    {
        foreach ($this->handlers as $handler) {
            $handler->handle_post($request);
        }
    }

}