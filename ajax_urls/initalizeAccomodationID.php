<?php

require_once('../config/connect.php');


$sql = "SELECT accomodation_profile.AccomodationID FROM accomodation_profile";
$result = $connection->query($sql);

if (!$result) {
    die();
}

while ($row = $result->fetch_assoc()) {

    $acc_id = $row["AccomodationID"];
}

echo $acc_id;
$connection->close();
