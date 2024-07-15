<?php

$router->get("/ratings/create", ["RatingController", "create"]);
$router->get("/ratings/edit/:id", ["RatingController", "edit"]);

$router->post("/ratings/create", ["RatingController", "postCreate"]);
$router->post("/ratings/edit", ["RatingController", "postEdit"]);

$router->delete("/ratings/delete/:id", ["RatingController", "delete"]);
