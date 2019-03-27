<?php

require_once('../config/connect.php');

session_start();

if (isset($_COOKIE)) {
    foreach ($_COOKIE as $name => $cookie) {
        if (strpos($name, 'rememberMe') !== false) {
            unset($_COOKIE[$name]);
            setcookie($name, null, -1, '/');
        }
    }
}

session_destroy();
header('Location: index.php');
