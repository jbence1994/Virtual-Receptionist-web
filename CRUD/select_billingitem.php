<?php

require_once('../config/connect.php');

$sql = "SELECT billing_item.ID, billing_item.BillingItemName, billing_item_category.BillingItemCategoryName, billing_item.Price FROM billing_item, billing_item_category WHERE billing_item.Category = billing_item_category.ID;";
$result = $connection->query($sql);

if (!$result) {
    die("Hiba az olvasás közben");
}

$rooms = "<table class='table table-striped' id='editable_table'>"
        . "<tr>"
        . "<th>Tétel</th>"
        . "<th>Kategória</th>"
        . "<th>Ár (Forint)</th>"
        . "<th></th>"
        . "<th></th>"
        . "</tr>";

while ($row = $result->fetch_assoc()) {
    $rooms .= "<tr>"
            . "<td contenteditable>{$row['BillingItemName']}</td>"
            . "<td contenteditable>{$row['BillingItemCategoryName']}</td>"
            . "<td contenteditable>{$row['Price']}</td>"
            . "<td><button class='btn btn-primary' class='delete' id='{$row['ID']}'>Tétel törlése</button></td>"
            . "<td><button class='btn btn-primary' class='update' id='{$row['ID']}'>Tétel módosítása</button></td>"
            . "</tr>";
}
echo $rooms;

$rooms = "<tr>"
        . "<td class='editable' id='billingitem' contenteditable></td>"
        . "<td class='editable' id='category' contenteditable></td>"
        . "<td class='editable' id='price' contenteditable></td>"
        . "<td colspan='2'><button class='btn btn-primary' class='insert'>Új tétel hozzáadása</button></td>"
        . "</tr>";
$rooms .= "</table>";
echo $rooms;

$connection->close();
