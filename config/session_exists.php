<?php

session_start();
if (!isset($_SESSION['accomodation'])) {
    header('Location: logged_out.php');
}
