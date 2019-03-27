<?php

require_once('../config/connect.php');
require_once('../templates/modal_delete_room.html');

$room = "SELECT * FROM room ORDER BY ID;";
$result = $connection->query($room);

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

$room_category = "SELECT billing_item.ID, billing_item.BillingItemName FROM billing_item, "
        . "billing_item_category WHERE billing_item.Category = billing_item_category.ID AND "
        . "billing_item_category.BillingItemCategoryName = 'Szállás';";

$room_categories_result = $connection->query($room_category);
$categories = [];

while ($item = $room_categories_result->fetch_assoc()) {
    $categories[] = $item;
}

while ($row = $result->fetch_assoc()) {
    $rooms .= "<tr>"
            . "<td contenteditable>{$row['Name']}</td>"
            . "<td contenteditable>{$row['Number']}</td>"
            . "<td contenteditable>{$row['Capacity']}</td>"
            . "<td><select class='browser-default custom-select'>";

    foreach ($categories as $category) {

        $selected = '';

        if ($category['ID'] == $row['Category']) {
            $selected = 'selected';
        }

        $rooms .= "<option $selected value='" . $category['ID'] . "'>{$category['BillingItemName']}</option>";
    }

    "</select>"
            . "</td>";

    $rooms .= "<td><input type='submit' class='btn btn-primary delete_room' id='{$row['ID']}' data-toggle='modal' data-target='#modal_delete_room' value='Szoba törlése'/></td>"
            . "<td><input type='submit' class='btn btn-primary update_room' id='{$row['ID']}' value='Szoba módosítása'/></td>"
            . "</tr>";
}
echo $rooms;

$rooms = "<tr>"
        . "<td class='editable' id='name' contenteditable></td>"
        . "<td class='editable' id='number' contenteditable></td>"
        . "<td class='editable' id='capacity' contenteditable></td>"
        . "<td><select class='browser-default custom-select'category' contenteditable></td>"
        . "<td colspan='2'><input type='submit' class='btn btn-success insert_room' value='Új szoba hozzáadása'/></td>"
        . "</tr>";
$rooms .= "</table>";
echo $rooms;

$connection->close();
