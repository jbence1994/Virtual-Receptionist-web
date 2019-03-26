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
 * Szálláshely adatait adatbázisban módosí metódus
 */
function setAccomodationData() {
    $.ajax({
        url: "../crud/update_accomodation.php",
        method: "post",
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
 * Kijelölt szobát kitörlő metódus
 */
function deleteRoom() {
    let id = $('');

    $.ajax({
        url: "../crud/delete_room.php",
        method: "post",
        dataType: "TEXT",
        data:
                {
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
