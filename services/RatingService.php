<?php

class RatingService
{
    public static function getAll()
    {
        global $database;

        try {
            $items = $database->getAll("SELECT * FROM ratings");
            return $items;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function getItem($id)
    {
        global $database;
        $params = [":id" => $id];

        try {
            $item = $database->getOne("SELECT * FROM ratings WHERE id = :id", $params);
            return $item;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function createItem($input)
    {
        global $database;

        $data = [
            "name" => $input["name"],
            "rating" => $input["rating"]
        ];

        try {
            $database->insert("ratings", $data);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
    public static function updateItem($input)
    {
        global $database;

        $data = [
            "name" => $input["name"],
            "rating" => $input["rating"]
        ];

        $id = $input["id"];

        try {
            $database->update("ratings", $data, "id = $id");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public static function deleteItem($id)
    {
        global $database;

        try {
            $database->delete("ratings", "id = $id");
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}