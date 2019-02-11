<?php

require_once('../config/connect.php');

$sql = "SELECT * FROM room";
$result = $connection->query($sql);

if (!$result) {
    die("Hiba az olvasás közben");
}

$rooms = "<table>"
        . "<tr>"
        . "<th>ID</th>"
        . "<th>Szoba neve</th>"
        . "<th>Szobaszám</th>"
        . "<th>Kategória</th>"
        . "<th>Kapacitás</th>"
        . "</tr>";

while ($row = $result->fetch_assoc()) {
    $rooms .= "<tr>"
            . "<td>{$row['ID']}</td>"
            . "<td>{$row['Name']}</td>"
            . "<td>{$row['Number']}</td>"
            . "<td>{$row['Category']}</td>"
            . "<td>{$row['Capacity']}</td>"
            . "<td>";
}
echo $rooms;

$rooms = "<tr>"
        . "<td id='ID'></td>"
        . "<td id='name' conteneditable></td>"
        . "<td id='number' conteneditable></td>"
        . "<td id='category' conteneditable></td>"
        . "<td id='capacity' conteneditable></td>"
        . "</tr>";
$rooms .= "</table>";
echo $rooms;

$connection->close();
