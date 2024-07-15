<?php
require 'php/Ratings.php';
require 'db_config.php';

$ratings = new Ratings($db_host, $db_user, $db_password, $db_name);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'add') {
        $name = $_POST['name'];
        $rating = $_POST['rating'];
        $ratings->addRating($name, $rating);
    } elseif ($action === 'edit') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $rating = $_POST['rating'];
        $ratings->editRating($id, $name, $rating);
    } elseif ($action === 'delete') {
        $id = $_POST['id'];
        $ratings->deleteRating($id);
    }
}

header('Location: index.php');
exit();
