<?php

class RatingController
{
    public static function all()
    {
        $ratings = RatingService::getAll();
        view("index/home", ["ratings" => $ratings]);
    }

    public static function create()
    {
        view("ratings/create");
    }

    public static function edit()
    {
        $id = $_GET["id"];
        $item = RatingService::getItem($id);
        view("ratings/edit", ["item" => $item]);
    }

    public static function postCreate()
    {
        RatingService::createItem($_POST);
        redirect("/");
    }

    public static function postEdit()
    {
        RatingService::updateItem($_POST);
        redirect("/");
    }

    public static function delete()
    {
        $id = $_GET["id"];
        RatingService::deleteItem($id);
    }
}