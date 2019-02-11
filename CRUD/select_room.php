<?php

require_once('../config/connect.php');

$sql = "SELECT room.ID, room.Name, room.Number, room_category.CategoryName, room.Capacity FROM room, room_category WHERE room.Category=room_category.ID ORDER BY ID;";
$result = $connection->query($sql);

if (!$result) {
    die("Hiba az olvasás közben");
}

$rooms = "<table id='room_table'>"
        . "<tr>"
        . "<th>ID</th>"
        . "<th>Szoba neve</th>"
        . "<th>Szobaszám</th>"
        . "<th>Szobakategória</th>"
        . "<th>Kapacitás (fő)</th>"
        . "</tr>";

while ($row = $result->fetch_assoc()) {
    $rooms .= "<tr>"
            . "<td>{$row['ID']}</td>"
            . "<td>{$row['Name']}</td>"
            . "<td>{$row['Number']}</td>"
            . "<td>{$row['CategoryName']}</td>"
            . "<td>{$row['Capacity']}</td>"
            . "<td><button class='btn btn-primary' class='delete' id='{$row['ID']}'>Törlés</button></td>"
            . "</tr>";
}
echo $rooms;

$rooms = "<tr>"
        . "<td id='ID'></td>"
        . "<td id='name' contenteditable></td>"
        . "<td id='number' contenteditable></td>"
        . "<td id='category' contenteditable></td>"
        . "<td id='capacity' contenteditable></td>"
        . "<td><button class='btn btn-primary' class='insert'>Hozzáadás</button></td>"
        . "</tr>";
$rooms .= "</table>";
echo $rooms;

$connection->close();
