<?php

require_once('../config/connect.php');

$sql = "SELECT accomodation.VATNumber FROM accomodation";
$result = $connection->query($sql);

if (!$result) {
    die("Hiba");
}

while ($row = $result->fetch_assoc()) {

    $vat = $row["VATNumber"];
}

echo '(' . $vat . ')';
$connection->close();
