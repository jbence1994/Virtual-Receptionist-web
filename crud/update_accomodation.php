<?php

require_once('../config/connect.php');

if (isset($_POST['accomodationName']) && $_POST['companyName'] && $_POST['contact'] && $_POST['VATNumber'] && $_POST['headquarters'] && $_POST['site'] && $_POST['phoneNumber'] && $_POST['emailAddress']) {

    $accomodationName = $_POST['accomodationName'];
    $companyName = $_POST['companyName'];
    $contact = $_POST['contact'];
    $VATNumber = $_POST['VATNumber'];
    $headquarters = $_POST['headquarters'];
    $site = $_POST['site'];
    $phoneNumber = $_POST['phoneNumber'];
    $emailAddress = $_POST['emailAddress'];

    $sql = "UPDATE accomodation SET accomodation.AccomodationName='$accomodationName', accomodation.CompanyName = '$companyName', "
            . "accomodation.Contact = '$contact', accomodation.VATNumber = '$VATNumber', accomodation.Headquarters = '$headquarters', accomodation.Site = '$site', "
            . "accomodation.PhoneNumber = '$phoneNumber', accomodation.EmailAddress = '$emailAddress';";

    $result = $connection->query($sql);

    if (!$result) {
        die("Hiba");
    }

    $connection->close();
}
