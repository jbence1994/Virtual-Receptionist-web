<?php

require_once('../config/connect.php');
require_once('../templates/modal_delete_billingitem.html');

$sql = "SELECT billing_item.ID, billing_item.BillingItemName, billing_item_category.BillingItemCategoryName, billing_item.Price FROM billing_item, billing_item_category WHERE billing_item.Category = billing_item_category.ID;";
$result = $connection->query($sql);

if (!$result) {
    die("Hiba az olvasás közben");
}

$billingItems = "<table class='table table-striped' id='editable_table'>"
        . "<tr>"
        . "<th>Tétel</th>"
        . "<th>Ár (Forint)</th>"
        . "<th>Kategória</th>"
        . "<th></th>"
        . "<th></th>"
        . "</tr>";

while ($row = $result->fetch_assoc()) {
    $billingItems .= "<tr>"
            . "<td contenteditable>{$row['BillingItemName']}</td>"
            . "<td contenteditable>{$row['Price']}</td>"
            . "<td><select class='browser-default custom-select'><option>{$row['BillingItemCategoryName']}</option></select></td>"
            . "<td><input type='submit' class='btn btn-primary' class='delete' id='{$row['ID']}' data-toggle='modal' data-target='#modal_delete_billingitem' value='Tétel törlése'/></td>"
            . "<td><input type='submit' class='btn btn-primary' class='update' id='{$row['ID']}' value='Tétel módosítása'/></td>"
            . "</tr>";
}
echo $billingItems;

$billingItems = "<tr>"
        . "<td class='editable' id='billingitem' contenteditable></td>"
        . "<td class='editable' id='price' contenteditable></td>"
        . "<td><select class='browser-default custom-select'category' contenteditable></td>"
        . "<td colspan='2'><input type='submit' class='btn btn-success' class='insert_billingItem' value='Új tétel hozzáadása'/></td>"
        . "</tr>";
$billingItems .= "</table>";
echo $billingItems;

$connection->close();
