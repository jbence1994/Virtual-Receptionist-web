<?php

session_start();
require_once('../config/connect.php');

if (isset($_POST['login'])) {
    $accomodationID = $_POST['accomodationID'];
    $password = $_POST['password'];

    $sql = "SELECT accomodation_profile.AccomodationID, accomodation_profile.Password FROM accomodation_profile WHERE accomodation_profile.AccomodationID = '$accomodationID' AND accomodation_profile.Password = '$password';";
    $result = $connection->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_row();
        $_SESSION['accomodation'] = $row[0];
        header('Location: mainmenu.php');
    } else {
        $_SESSION['login_error'] = "Helytelen felhasználónév vagy jelszó!";
        header('Location: index.php');
    }
}
