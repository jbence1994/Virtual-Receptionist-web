<?php

require_once('../config/connect.php');

if (!empty($_POST['id'])) {

    $id = $_POST['id'];

    $sql = "DELETE FROM room WHERE ID = '$id'";
    $result = $connection->query($sql);

    if (!$result) {
        die("Hiba!");
    }

    $connection->close();
}
