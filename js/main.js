$(document).ready(function () {

    /*
     * Tooltip -> Bootstrap
     */
    $('[data-toggle="tooltip"]').tooltip();

    updateAccomodationData();
    getRooms();
    getBillingItems();
    inializeAccomodationNameOnNavbar();
    inializeAccomodationVATNumberOnNavbar();
    inializeAccomodationIDOnNavbar();

    $(document).on("click", "#updateCompanyData", function (event) {

        /*
         * submit alapértelmezett működése letitva, hogy ajax kéréssel történjen a módosítás
         */
        event.preventDefault();
        updateAccomodationData();
    });

    // egyéb jQuery események, TODO ...
});

/*
 * Szálláshely nevének betöltése a navigációs sávra
 */
function inializeAccomodationNameOnNavbar() {

    $.ajax({
        url: "../ajax_urls/initializeAccomodationName.php",
        method: "get",
        success: function (answer) {
            $('#accName_navbar').html(answer);
        },
        error: function (xhr) {
            alert(xhr.status);
        }
    });
}

/*
 * Szálláshely adószámának betöltése a navigációs sávra
 */
function inializeAccomodationVATNumberOnNavbar() {

    $.ajax({
        url: "../ajax_urls/initializeAccomodationVATNumber.php",
        method: "get",
        success: function (answer) {
            $('#accVAT_navbar').html(answer);
        },
        error: function (xhr) {
            alert(xhr.status);
        }
    });
}

/*
 * Szálláshely szálláshelyazonosítójának betöltése a navigációs sávra
 */
function inializeAccomodationIDOnNavbar() {

    $.ajax({
        url: "../ajax_urls/initalizeAccomodationID.php",
        method: "get",
        success: function (answer) {
            $('#accID_navbar').html(answer);
        },
        error: function (xhr) {
            alert(xhr.status);
        }
    });
}

/*
 * Szálláshely adatait adatbázisból leolvasó metódus
 */
function getAccomodationData() {

    $.ajax({
        url: "../ajax_urls/select_accomodation.php",
        method: "get",
        success: function (answer) {
            $('#accomodation_data_box').html(answer);
        },
        error: function (xhr) {
            alert(xhr.status);
        }
    });
}

/*
 * Számlázási tételeket adatbázisból leolvasó metódus
 */
function getBillingItems() {

    $.ajax({
        url: "../ajax_urls/select_billingitem.php",
        method: "get",
        success: function (answer) {
            $('#billingitems').html(answer);
        },
        error: function (xhr) {
            alert(xhr.status);
        }
    });
}

/*
 * Szobák adatait adatbázisból leolvasó metódus
 */
function getRooms() {

    $.ajax({
        url: "../ajax_urls/select_room.php",
        method: "get",
        success: function (answer) {
            $('#rooms').html(answer);
        },
        error: function (xhr) {
            alert(xhr.status);
        }
    });
}

/*
 * Szálláshely adatait adatbázisban módosító metódus
 */
function updateAccomodationData() {

    $.ajax({
        url: "../ajax_urls/update_accomodation.php",
        method: "post",
        dataType: "TEXT",
        data: $('#acc_data').serialize(),
        success: function () {
            inializeAccomodationNameOnNavbar();
            inializeAccomodationVATNumberOnNavbar();
            inializeAccomodationIDOnNavbar();
            getAccomodationData();
        },
        error: function (xhr) {
            alert(xhr.status);
        }
    });
}

/*
 * Számlázási tétel adatait adatbázisban módosító metódus
 */
function updateBillingItem() {

    $.ajax({
        url: "../ajax_urls/update_billingitem.php",
        method: "post",
        data: {},
        dataType: "TEXT",
        success: function () {

        },
        error: function (xhr)
        {
            alert(xhr.status);
        }
    });
}

/*
 * Szoba adatait adatbázisban módosító metódus
 */
function updateRoom() {

    $.ajax({
        url: "../ajax_urls/update_room.php",
        method: "post",
        data: {},
        dataType: "TEXT",
        success: function () {

        },
        error: function (xhr)
        {
            alert(xhr.status);
        }
    });
}

/*
 * Kijelölt számlázási tételt adatbázisból törlő metódus
 */
function deleteBillingItem() {

    $.ajax({
        url: "../ajax_urls/delete_billingitem.php",
        method: "post",
        data: {},
        dataType: "TEXT",
        success: function () {

        },
        error: function (xhr)
        {
            alert(xhr.status);
        }
    });
}

/*
 * Kijelölt szobát adatbázisból törlő metódus
 */
function deleteRoom() {

    $.ajax({
        url: "../ajax_urls/delete_room.php",
        method: "post",
        data: {},
        dataType: "TEXT",
        success: function () {

        },
        error: function (xhr)
        {
            alert(xhr.status);
        }
    });
}

/*
 * Új számlázási tétel felvitele adatbázisba
 */
function createBillingItem() {

    $.ajax({
        url: "../ajax_urls/create_billingitem.php",
        method: "post",
        data: {},
        dataType: "TEXT",
        success: function () {

        },
        error: function (xhr)
        {
            alert(xhr.status);
        }
    });
}


/**
 * Új szoba felvitele adatbázisba
 */
function createRoom() {

    $.ajax({
        url: "../ajax_urls/create_room.php",
        method: "post",
        data: {},
        dataType: "TEXT",
        success: function () {

        },
        error: function (xhr)
        {
            alert(xhr.status);
        }
    });
}
