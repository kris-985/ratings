<?php

class ErrorController
{
    public static function notFound()
    {
        view("errors/404");
    }
}
