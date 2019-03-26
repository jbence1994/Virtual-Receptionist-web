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
            . "<td><input type='submit' class='btn btn-primary' class='delete' id='{$row['ID']}' data-toggle='modal' data-target='#modal_delete_room' value='Szoba törlése'/></td>"
            . "<td><input type='submit' class='btn btn-primary' class='update' id='{$row['ID']}' value='Szoba módosítása'/></td>"
            . "</tr>";
}
echo $rooms;

$rooms = "<tr>"
        . "<td class='editable' id='name' contenteditable></td>"
        . "<td class='editable' id='number' contenteditable></td>"
        . "<td class='editable' id='capacity' contenteditable></td>"
        . "<td><select class='browser-default custom-select'category' contenteditable></td>"
        . "<td colspan='2'><input type='submit' class='btn btn-success' class='insert' value='Új szoba hozzáadása'/></td>"
        . "</tr>";
$rooms .= "</table>";
echo $rooms;

$connection->close();
