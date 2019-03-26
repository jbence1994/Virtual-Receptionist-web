<?php

require_once('../config/connect.php');

$sql = "SELECT * FROM accomodation;";
$result = $connection->query($sql);

if (!$result) {
    die("Hiba az olvasás közben");
}

while ($row = $result->fetch_assoc()) {
    $accomodation = "<form method='post' id='acc_data'><input type='text' name='accomodationName' id='accomodationName' class='form-control' placeholder='Szálláshely neve' value='{$row['AccomodationName']}' required/>"
            . "<input type='text' name='companyName' id='companyName' class='form-control' placeholder='Cégnév' value='{$row['CompanyName']}' required/>"
            . "<input type='text' name='contact' id='contact' class='form-control' placeholder='Kapcsolattartó' value='{$row['Contact']}' required/>"
            . "<input type='text' name='VATNumber' id='VATNumber' class='form-control' placeholder='Adószám' value='{$row['VATNumber']}' required/>"
            . "<input type='text' name='headquarters' id='headquarters' class='form-control' placeholder='Székhely' value='{$row['Headquarters']}' required/>"
            . "<input type='text' name='site' id='site' class='form-control' placeholder='Telephely' value='{$row['Site']}' required/>"
            . "<input type='text' name='phoneNumber' id='phoneNumber' class='form-control' placeholder='Telefonszám' value='{$row['PhoneNumber']}' required/>"
            . "<input type='text' name='emailAddress' id='emailAddress' class='form-control' placeholder='E-mail cím' value='{$row['EmailAddress']}' required/>"
            . "<input type='submit' name='updateCompanyData' id='updateCompanyData' class='btn btn-primary' value='Adatok módosítása'/></form>";
}
echo $accomodation;

$connection->close();
