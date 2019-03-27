<?php

require_once('../config/connect.php');

$sql = "";
$result = $connection->query($sql);

if (!$result) {
    die("Hiba!");
}

$connection->close();
