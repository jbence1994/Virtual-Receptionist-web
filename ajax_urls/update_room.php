<?php

require_once('../config/connect.php');

if (!empty($_POST['id']) && !empty($_POST['name']) && !empty($_POST['number']) && !empty($_POST['capacity']) && !empty($_POST['category'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $capacity = $_POST['capacity'];
    $category = $_POST['category'];

    $sql = "UPDATE room SET Number = '$number', Name = '$name', Category = '$category', Capacity = '$capacity' WHERE ID = '$id';";
    $result = $connection->query($sql);

    if (!$result) {
        die("Hiba!");
    }

    $connection->close();
}
