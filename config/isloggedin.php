<?php

session_start();
if (!isset($_SESSION['accomodation'])) {
    die();
}
