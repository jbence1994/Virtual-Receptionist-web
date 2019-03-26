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
        . "<th>Kategória</th>"
        . "<th>Ár (Forint)</th>"
        . "<th></th>"
        . "<th></th>"
        . "</tr>";

while ($row = $result->fetch_assoc()) {
    $billingItems .= "<tr>"
            . "<td contenteditable>{$row['BillingItemName']}</td>"
            . "<td><select class='browser-default custom-select'><option>{$row['BillingItemCategoryName']}</option></select></td>"
            . "<td contenteditable>{$row['Price']}</td>"
            . "<td><button class='btn btn-danger' class='delete' id='{$row['ID']}' data-toggle='modal' data-target='#modal_delete_billingitem'>Tétel törlése</button></td>"
            . "<td><button class='btn btn-warning' class='update' id='{$row['ID']}'>Tétel módosítása</button></td>"
            . "</tr>";
}
echo $billingItems;

$billingItems = "<tr>"
        . "<td class='editable' id='billingitem' contenteditable></td>"
        . "<td class='editable' id='category' contenteditable></td>"
        . "<td class='editable' id='price' contenteditable></td>"
        . "<td colspan='2'><button class='btn btn-success' class='insert'>Új tétel hozzáadása</button></td>"
        . "</tr>";
$billingItems .= "</table>";
echo $billingItems;

$connection->close();
