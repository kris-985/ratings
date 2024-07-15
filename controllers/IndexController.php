<?php

class IndexController
{
    public static function home()
    {
        view("index/home");
    }

    public static function about()
    {
        view("index/about");
    }
}