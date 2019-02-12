<?php

require_once('../config/connect.php');

$sql = "SELECT * FROM accomodation, accomodation_profie WHERE accomodation_profile.Accomodation = accomodation.ID;";
$result = $connection->query($sql);

if (!$result) {
    die("Hiba az olvasás közben");
}
