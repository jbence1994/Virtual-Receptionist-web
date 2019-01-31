<?php

session_start();
require_once('../config/connect.php');

if (isset(post('submit'))) {
    $username = post('username');
    $password = post('password');
}
