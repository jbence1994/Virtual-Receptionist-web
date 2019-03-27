<?php

require_once('../config/connect.php');

$sql = "SELECT accomodation.AccomodationName FROM accomodation";
$result = $connection->query($sql);

if (!$result) {
    die("Hiba");
}

while ($row = $result->fetch_assoc()) {

    $accName = $row["AccomodationName"];
}

echo $accName;
$connection->close();
