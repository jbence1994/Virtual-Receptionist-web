$(document).ready(function () {

    /*
     * Tooltip -> Bootstrap
     */
    $('[data-toggle="tooltip"]').tooltip();

    getRooms();
    getAccomodationData();
    getBillingItems();
    initalizeAccomodationDataOnNavbar();

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
 * Szálláshely adatok betöltése a navigációs sávra
 */
function initalizeAccomodationDataOnNavbar() {
    $.ajax({
        url: "../crud/initializeNavbarAccomodationData.php",
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
 * Szálláshely adatait adatbázisban módosító metódus
 */
function setAccomodationData() {
    $.ajax({
        url: "../crud/update_accomodation.php",
        method: "post",
        dataType: "TEXT",
        data: $('#acc_data').serialize(),
        success: function () {
            initalizeAccomodationDataOnNavbar();
            getAccomodationData();
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
 * Kijelölt szobát kitörlő metódus
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
