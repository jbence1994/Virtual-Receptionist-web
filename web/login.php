<?php

session_start();
require_once('../config/connect.php');

if (isset($_POST['login'])) {

    $accomodationID = $_POST['accomodationID'];
    $password = $_POST['password'];
    
    if (isset($_POST['rememberMe'])) {
        // 30 days
        setcookie("rememberMe-$accomodationID", true, time() + (86400 * 30), '/');
    }
    
    $sql = "SELECT accomodation_profile.AccomodationID, accomodation_profile.Password FROM accomodation_profile WHERE accomodation_profile.AccomodationID = ? AND accomodation_profile.Password = ?;";

    $statement = $connection->prepare($sql);
    $statement->bind_param('ss', $accomodationID, $password);
    $statement->execute();
    $statement->store_result();

    if ($statement->num_rows == 1) {

        /*
         * Sikeres bejelentkezés
         */

        $statement->bind_result($accomodationID, $password);
        $statement->fetch();

        $_SESSION['accomodation'] = $accomodationID;

        $statement->close();
        header('Location: mainmenu.php');
    } else {

        /*
         * Sikertelen bejelentkezés
         */

        header('Location: index.php');
    }
}
