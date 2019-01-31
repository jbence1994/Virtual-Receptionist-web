<?php

session_start();
require_once('../config/connect.php');

if (isset(post('submit'))) {
    $accomodationID = post('accomodationID');
    $password = post('password');

    $sql = "SELECT accomodation.AccomodationID, accomodation.Password FROM accomodation WHERE accomodation.AccomodationID = '$accomodationID' AND accomodation.Password = '$password';";
    $result = $connection->query($sql);
}
