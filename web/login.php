<?php

session_start();
require_once('../config/connect.php');

if (isset(post('login'))) {
    $accomodationID = post('accomodationID');
    $password = post('password');

    $sql = "SELECT accomodation.AccomodationID, accomodation.Password FROM accomodation WHERE accomodation.AccomodationID = '$accomodationID' AND accomodation.Password = '$password';";
    $result = $connection->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_row();
        session('accomodation') = $row[0];
        header('Location: mainmenu.php');
    } else {
        session('login_error') = "Helytelen felhasználónév vagy jelszó!";
        header('Location: index.php');
    }
}
