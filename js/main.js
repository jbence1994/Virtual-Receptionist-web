$(document).ready(function () {

    /*
     * Tooltip -> Bootstrap
     */
    $('[data-toggle="tooltip"]').tooltip();

    getRooms();
    updateAccomodationData();
    getBillingItems();
    inializeAccomodationNameOnNavbar();
    inializeAccomodationVATNumberOnNavbar();
    inializeAccomodationIDOnNavbar();

    $(document).on("click", "#updateCompanyData", function (event) {

        /*
         * submit alapértelmezett működése letitva, hogy ajax kéréssel történjen a módosítás
         */
        event.preventDefault();
        setAccomodationData();
    });

    $(document).on("click", "#modal_delete", function () {
        deleteRoom();
    });
});

/*
 * Szálláshely nevének betöltése a navigációs sávra
 */
function inializeAccomodationNameOnNavbar() {
    $.ajax({
        url: "../crud/initializeAccomodationName.php",
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
        url: "../crud/initializeAccomodationVATNumber.php",
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
        url: "../crud/initalizeAccomodationID.php",
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
        url: "../crud/select_accomodation.php",
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
        url: "../crud/select_billingitem.php",
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
        url: "../crud/select_room.php",
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
        url: "../crud/update_accomodation.php",
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

    });
}

/*
 * Szoba adatait adatbázisban módosító metódus
 */
function updateRoom() {
    $.ajax({

    });
}

/*
 * Kijelölt számlázási tételt adatbázisból törlő metódus
 */
function deleteBillingItem() {
    $.ajax({

    });
}

/*
 * Kijelölt szobát adatbázisból törlő metódus
 */
function deleteRoom() {
    let id = $('');
    $.ajax({
        url: "../crud/delete_room.php",
        method: "post",
        dataType: "TEXT",
        data: {
            delete: id
        },
        success: function () {
            getRooms();
        },
        error: function (xhr) {
            alert(xhr.status);
        }
    });
}

/*
 * Új számlázási tétel felvitele adatbázisba
 */
function createBillingItem() {
    $.ajax({

    });
}


/**
 * Új szoba felvitele adatbázisba
 */
function createRoom() {
    $.ajax({

    });
}
