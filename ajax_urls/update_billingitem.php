<?php

require_once('../config/connect.php');

if (!empty($_POST['id']) && !empty($_POST['name'] && (!empty($_POST['price']) || $_POST['price'] == 0) && !empty($_POST['category']))) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $sql = "UPDATE billing_item SET BillingItemName='$name', Price='$price', Category='$category'  WHERE ID = '$id';";
    $result = $connection->query($sql);

    if (!$result) {
        die("Hiba!");
    }

    $connection->close();
}
