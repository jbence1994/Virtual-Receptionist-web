$(document).ready(function () {

    /*
     * Tooltip -> Bootstrap
     */
    $('[data-toggle="tooltip"]').tooltip();
    getRooms();
    getAccomodationData();
    getBillingItems();


});

/*
 * Szobák adatait adatbázisból leolvasó metódus
 */
function getRooms() {
    $.ajax({
        url: "../CRUD/select_room.php",
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
 * Szálláshely adatait adatbázisból leolvasó metódus
 */
function getAccomodationData() {
    $.ajax({
        url: "../CRUD/select_accomodation.php",
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
        url: "../CRUD/select_billingitem.php",
        method: "get",
        success: function (answer) {
            $('#billingitems').html(answer);
        },
        error: function (xhr) {
            alert(xhr.status);
        }
    });
}
