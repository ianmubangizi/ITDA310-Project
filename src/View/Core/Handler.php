<?php


namespace Hospital\View\Core;


interface Handler
{
    public static function handle_get($request);
    public static function handle_post($request);
}
