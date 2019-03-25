<?php

require_once('../config/connect.php');

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM room WHERE ID = '$id';";

    $result = $connection->query($sql);

    if (!$result) {
        die('Hiba a törlés során!');
    }
}

$connection->close();
