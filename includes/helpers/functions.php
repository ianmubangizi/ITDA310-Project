<?php

/**
 * @param $page
 * @return mixed|string
 */
function split_url($page)
{
    return explode('/', $page)[4];
}
