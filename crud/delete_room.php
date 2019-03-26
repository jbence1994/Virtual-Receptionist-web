<?php

require_once('../config/connect.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM room WHERE room.ID = '$id';";

    $result = $connection->query($sql);

    if (!$result) {
        die('Hiba a törlés során!');
    }
}

$connection->close();
