<?php

require_once('../config/connect.php');

if (isset($_POST['delete'])) {
    $roomNumber = $_POST['delete'];
    $sql = "DELETE FROM room WHERE room.NumberID = '$roomNumber';";

    $result = $connection->query($sql);

    if (!$result) {
        die('Hiba a törlés során!');
    }
}

$connection->close();
