<?php

$connection = new mysqli('localhost', 'root', '', 'virtual_receptionist', '3306');

if ($connection->connect_errno) {
    die('Nem sikerült csatlakozni!\n' . $connection_error);
}

if (!$connection->set_charset("utf8")) {
    echo 'Nem sikerült beállítani a karakterkódolást!\n' . $connection->error;
}
