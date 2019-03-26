<?php

require_once('../config/connect.php');


$sql = "SELECT accomodation_profile.AccomodationID, accomodation.AccomodationName, accomodation.VATNumber FROM accomodation, accomodation_profile";
$result = $connection->query($sql);

if (!$result) {
    die();
}

while ($row = $result->fetch_assoc()) {

    $acc_id = $row["AccomodationID"];
    $accomodationName = $row["AccomodationName"];
    $vat = $row["VATNumber"];
}

echo $acc_id;
echo $accomodationName;
echo $vat;
