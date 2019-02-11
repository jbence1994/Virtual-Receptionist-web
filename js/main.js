$(document).ready(function () {
    
    /**
     * Tooltip -> Bootstrap
     */
    $('[data-toggle="tooltip"]').tooltip();
    /**
     * Szobák kiolvasása adatbázisból
     */
    getRooms();
});

/**
 * Adatbázis leolvasó metódus
 */
function getRooms() {
    $.ajax({
        url: "../CRUD/select_room.php",
        method: "post",
        success: function (answer) {
            $('#rooms').html(answer);
        },
        error: function (xhr) {
            alert(xhr.status);
        }
    });
}
