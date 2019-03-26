<?php

require_once('../config/connect.php');
require_once('../templates/modal_delete_room.html');

$sql = "SELECT room.ID, room.Name, room.Number, billing_item.BillingItemName, room.Capacity FROM room, billing_item WHERE room.Category=billing_item.ID ORDER BY room.ID;";
$result = $connection->query($sql);

if (!$result) {
    die("Hiba az olvasás közben");
}

$rooms = "<table class='table table-striped' id='editable_table'>"
        . "<tr>"
        . "<th>Szoba neve</th>"
        . "<th>Szobaszám</th>"
        . "<th>Kapacitás (fő)</th>"
        . "<th>Szobakategória</th>"
        . "<th></th>"
        . "<th></th>"
        . "</tr>";

while ($row = $result->fetch_assoc()) {
    $rooms .= "<tr>"
            . "<td contenteditable>{$row['Name']}</td>"
            . "<td contenteditable>{$row['Number']}</td>"
            . "<td contenteditable>{$row['Capacity']}</td>"
            . "<td><select class='browser-default custom-select'><option>{$row['BillingItemName']}</option></select></td>"
            . "<td><button class='btn btn-danger' class='delete' id='{$row['ID']}' data-toggle='modal' data-target='#modal_delete_room'>Szoba törlése</button></td>"
            . "<td><button class='btn btn-warning' class='update' id='{$row['ID']}'>Szoba módosítása</button></td>"
            . "</tr>";
}
echo $rooms;

$rooms = "<tr>"
        . "<td class='editable' id='name' contenteditable></td>"
        . "<td class='editable' id='number' contenteditable></td>"
        . "<td class='editable' id='capacity' contenteditable></td>"
        . "<td><select class='browser-default custom-select'category' contenteditable></td>"
        . "<td colspan='2'><button class='btn btn-success' class='insert'>Új szoba hozzáadása</button></td>"
        . "</tr>";
$rooms .= "</table>";
echo $rooms;

$connection->close();
