<?php

require_once('../config/connect.php');
require_once('../templates/modal_delete.html');

$sql = "SELECT room.ID, room.Name, room.Number, room_category.CategoryName, room.Capacity FROM room, room_category WHERE room.Category=room_category.ID ORDER BY ID;";
$result = $connection->query($sql);

if (!$result) {
    die("Hiba az olvasás közben");
}

$rooms = "<table class='table table-striped' id='editable_table'>"
        . "<tr>"
        . "<th>Szoba neve</th>"
        . "<th>Szobaszám</th>"
        . "<th>Szobakategória</th>"
        . "<th>Kapacitás (fő)</th>"
        . "<th></th>"
        . "<th></th>"
        . "</tr>";

while ($row = $result->fetch_assoc()) {
    $rooms .= "<tr>"
            . "<td contenteditable>{$row['Name']}</td>"
            . "<td contenteditable>{$row['Number']}</td>"
            . "<td contenteditable>{$row['CategoryName']}</td>"
            . "<td contenteditable>{$row['Capacity']}</td>"
            . "<td><button class='btn btn-primary' class='delete' id='{$row['ID']}' data-toggle='modal' data-target='#modal_delete'>Szoba törlése</button></td>"
            . "<td><button class='btn btn-primary' class='update' id='{$row['ID']}'>Szoba módosítása</button></td>"
            . "</tr>";
}
echo $rooms;

$rooms = "<tr>"
        . "<td class='editable' id='ID'></td>"
        . "<td class='editable' id='name' contenteditable></td>"
        . "<td class='editable' id='number' contenteditable></td>"
        . "<td class='editable' id='category' contenteditable></td>"
        . "<td class='editable' id='capacity' contenteditable></td>"
        . "<td colspan='2'><button class='btn btn-primary' class='insert'>Új szoba hozzáadása</button></td>"
        . "</tr>";
$rooms .= "</table>";
echo $rooms;

$connection->close();
