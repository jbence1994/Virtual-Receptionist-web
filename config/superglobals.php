<?php

function server($assoc) {
    return $_SERVER[$assoc];
}

function post($assoc) {
    return $_POST[$assoc];
}

function get($assoc) {
    return $_GET[$assoc];
}

function files($assoc) {
    return $_FILES[$assoc];
}

function cookie($assoc) {
    return $_COOKIE[$assoc];
}

function session($assoc) {
    return $_SESSION[$assoc];
}
