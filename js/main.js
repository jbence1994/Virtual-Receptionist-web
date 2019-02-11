$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();

    getRooms();
});

/**
 * Adatbázis leolvasó metódus
 */
function getRooms() {
    $.get("../CRUD/select_room.php", function (answer) {
        $('#rooms').html(answer);
    });
}
