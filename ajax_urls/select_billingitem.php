<?php

require_once('../config/connect.php');
require_once('../templates/modal_delete_billingitem.html');

$result_per_page = 5;

$billing_item = "SELECT * FROM billing_item;";
$result = $connection->query($billing_item);

if (!$result) {
    die("Hiba");
}

$result_rows = $result->num_rows;

$billingItems = "<table class='table table-striped' id='editable_table'>"
        . "<tr>"
        . "<th>Tétel</th>"
        . "<th>Ár (Forint)</th>"
        . "<th>Kategória</th>"
        . "<th></th>"
        . "<th></th>"
        . "</tr>";

$billing_item_category = "SELECT ID, BillingItemCategoryName FROM billing_item_category;";
$billing_item_categories_result = $connection->query($billing_item_category);
$categorires = [];

$number_of_pages = ceil($result_rows / $result_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$this_page_first_result = ($page - 1) * $result_per_page;

$sql = "SELECT * FROM billing_item LIMIT " . $this_page_first_result . ", " . $result_per_page . ";";
$result = $connection->query($sql);

if (!$result) {
    die("Hiba");
}

$billingItems = "<table class='table table-striped' id='editable_table'>"
        . "<tr>"
        . "<th>Tétel</th>"
        . "<th>Ár (Forint)</th>"
        . "<th>Kategória</th>"
        . "<th></th>"
        . "<th></th>"
        . "</tr>";

$billing_item_category = "SELECT ID, BillingItemCategoryName FROM billing_item_category;";
$billing_item_categories_result = $connection->query($billing_item_category);
$categorires = [];

while ($item = $billing_item_categories_result->fetch_assoc()) {
    $categories[] = $item;
}

while ($row = $result->fetch_assoc()) {

    $billingItems .= "<tr id='{$row['ID']}'>"
            . "<td class='row_name' contenteditable>{$row['BillingItemName']}</td>"
            . "<td class='row_price' contenteditable>{$row['Price']}</td>"
            . "<td class='row_select'>"
            . "<select class='browser-default custom-select'>";

    foreach ($categories as $category) {

        $selected = '';

        if ($category['ID'] == $row['Category']) {

            $selected = 'selected';
        }

        $billingItems .= "<option $selected value='" . $category['ID'] . "'>{$category['BillingItemCategoryName']}</option>";
    }

    "</select>"
            . "</td>";

    $billingItems .= "<td><input type='submit' class='btn btn-primary delete_billingitem' data-toggle='modal' data-target='#modal_delete_billingitem' value='Tétel törlése'/></td>";
    $billingItems .= "<td><input type='submit' class='btn btn-primary update_billingitem' id='{$row['ID']}' value='Tétel módosítása'/></td>";
    $billingItems .= "</tr>";
}
echo $billingItems;

$billingItems = "<tr id='edit_row'>"
        . "<td class='editable row_name' contenteditable></td>"
        . "<td class='editable row_price' contenteditable></td>"
        . "<td>"
        . "<select class='browser-default custom-select row_select' contenteditable>";

foreach ($categories as $category) {

    $billingItems .= "<option value='" . $category['ID'] . "'>{$category['BillingItemCategoryName']}</option>";
}

$billingItems .= "</select>";
$billingItems .= "</td>";
$billingItems .= "<td colspan='2'><input type='submit' class='btn btn-success insert_billingItem' value='Új tétel hozzáadása'/></td>";
$billingItems .= "</tr>";
$billingItems .= "</table>";

echo $billingItems;

echo '<ul class="pagination justify-content-center">';
for ($page = 1; $page <= $number_of_pages; $page++) {
    echo '<li class="page-item"><a class="page-link" href="setbilling.php?page=' . $page . '"/>' . $page . '</a>';
}
echo '</li></ul>';

$connection->close();
