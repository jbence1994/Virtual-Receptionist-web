<?php

session_start();

if (!isset($_SESSION['accomodation'])) {
    if (isset($_COOKIE)) {
       foreach ($_COOKIE as $name => $cookie) {
           $rememberMe = preg_split('/\-/', $name);
           
           if (empty($rememberMe[0]) || $rememberMe[0] !== "rememberMe") {
               continue;
           }
           
           if (!empty($rememberMe[1])) {
               $cookie_set = true;
               $_SESSION['accomodation'] = $rememberMe[1];
           }
       } 
    }

    if (!isset($cookie_set)) {
        header('Location: logged_out.php');
    }
}
