$(document).ready(function () {

    /*
     * Tooltip -> Bootstrap
     */
    $('[data-toggle="tooltip"]').tooltip();

    getRooms();
    getAccomodationData();
    getBillingItems();

    $(document).on("click", "#updateCompanyData", function () {
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

    let accomodationName = $('#accomodationName').val();
    let companyName = $('#companyName').val();
    let contact = $('#contact').val();
    let VATNumber = $('#VATNumber').val();
    let headquarters = $('#headquarters').val();
    let site = $('#site').val();
    let phoneNumber = $('#phoneNumber').val();
    let emailAddress = $('#emailAddress').val();

    $.ajax({
        url: "../crud/update_accomodation.php",
        method: "post",
        dataType: "TEXT",
        data: {
            "accomodationName": accomodationName,
            "companyName": companyName,
            "contact": contact,
            "VATNumber": VATNumber,
            "headquarters": headquarters,
            "site": site,
            "phoneNumber": phoneNumber,
            "emailAddress": emailAddress
        },
        success: function () {
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
