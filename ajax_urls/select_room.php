<?php

require_once('../config/connect.php');
require_once('../templates/modal_delete_room.html');

$room = "SELECT * FROM room ORDER BY Number;";
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
    $rooms .= "<tr id='{$row['ID']}'>"
            . "<td class='row_room_name' contenteditable>{$row['Name']}</td>"
            . "<td class='row_room_number' contenteditable>{$row['Number']}</td>"
            . "<td class='row_room_capacity' contenteditable>{$row['Capacity']}</td>"
            . "<td class='row_roomcat_select'>"
            . "<select class='browser-default custom-select'>";

    foreach ($categories as $category) {

        $selected = '';

        if ($category['ID'] == $row['Category']) {
            $selected = 'selected';
        }

        $rooms .= "<option $selected value='" . $category['ID'] . "'>{$category['BillingItemName']}</option>";
    }

    "</select>"
            . "</td>";

    $rooms .= "<td><input type='submit' class='btn btn-primary delete_room' data-toggle='modal' data-target='#modal_delete_room' value='Szoba törlése'/></td>"
            . "<td><input type='submit' class='btn btn-primary update_room' id='{$row['ID']}' value='Szoba módosítása'/></td>"
            . "</tr>";
}
echo $rooms;

$rooms = "<tr id='edit_row_room'>"
        . "<td class='editable row_room_name' contenteditable></td>"
        . "<td class='editable row_room_number' contenteditable></td>"
        . "<td class='editable row_room_capacity' contenteditable></td>"
        . "<td>"
        . "<select class='browser-default custom-select row_select' contenteditable>";

foreach ($categories as $category) {

    $rooms .= "<option value='" . $category['ID'] . "'>{$category['BillingItemName']}</option>";
}

$rooms .= "</select>";
$rooms .= "</td>";
$rooms .= "<td colspan='2'><input type='submit' class='btn btn-success insert_room' value='Új szoba hozzáadása'/></td>";
$rooms .= "</tr>";
$rooms .= "</table>";
echo $rooms;

$connection->close();
