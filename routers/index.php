<?php

$router = new Router();

$uri = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$router->get("/", ["RatingController", "all"]);

require "ratings.php";

$router->route($uri, $method);