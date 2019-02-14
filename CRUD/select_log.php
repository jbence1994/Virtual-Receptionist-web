<?php

require_once('../config/connect.php');

$sql = "SELECT * FROM log;";
$result = $connection->query($sql);

if (!$result) {
    die("Hiba az olvasás közben");
}

$logs = "<table class='table table-striped' id='editable_table'>"
        . "<tr>"
        . "<th>Kliens számítógép</th>"
        . "<th>Operációs rendszer</th>"
        . "<th>Bejelentkezés dátuma</th>"
        . "<th>Kijelentkezés dátuma</th>"
        . "</tr>";

while ($row = $result->fetch_assoc()) {
    $logs .= "<tr>"
            . "<td contenteditable>{$row['Client']}</td>"
            . "<td contenteditable>{$row['OS_Version']}</td>"
            . "<td contenteditable>{$row['LoginDate']}</td>"
            . "<td contenteditable>{$row['LogoutDate']}</td>"
            . "</tr>";
}
echo $logs;

$connection->close();
