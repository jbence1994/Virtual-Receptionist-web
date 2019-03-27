<?php

require_once('../config/connect.php');

if (!empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['price'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $sql = "INSERT INTO billing_item (BillingItemName, Category, Price) VALUES ('$name', '$category', '$price');";
    $result = $connection->query($sql);

    if (!$result) {
        die("Hiba!");
    }

    $connection->close();
}
