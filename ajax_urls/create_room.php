<?php

require_once('../config/connect.php');

if (!empty($_POST['name']) && !empty($_POST['number']) && !empty($_POST['capacity']) && !empty($_POST['category'])) {

    $name = $_POST['name'];
    $number = $_POST['number'];
    $capacity = $_POST['capacity'];
    $category = $_POST['category'];

    $sql = "INSERT INTO room (Number, Name, Category, Capacity) "
            . "VALUES ('$number','$name','$category', '$capacity');";
    $result = $connection->query($sql);

    if (!$result) {
        die("Hiba!");
    }

    $connection->close();
}
