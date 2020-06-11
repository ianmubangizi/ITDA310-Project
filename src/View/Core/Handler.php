<?php


namespace Hospital\View\Core;


interface Handler
{
    public function handle_get($request);
    public function handle_post($request);
}
