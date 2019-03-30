$(document).ready(function () {

    /**
     * Tooltip hover event -> Bootstrap 4
     */
    $('[data-toggle="tooltip"]').tooltip();

    /**
     * Szálláshely adatainak lekérése adatbázisból
     */
    getAccomodationData();

    /**
     * Szobák lekérése adatbázisból
     */
    getRooms();

    /**
     * Számlázási tételek lekérése adatbázisból
     */
    getBillingItems();

    /**
     * Szálláshely aktuális, módosítás előtti nevének inicializálása navigációs sávra
     */
    inializeAccomodationNameOnNavbar();

    /**
     * Szálláshely aktuális, módosítás előtti adószámának inicializálása navigációs sávra
     */
    inializeAccomodationVATNumberOnNavbar();

    /**
     * Szálláshely szálláshelyazonosítójának inicializálása navigációs sávra
     */
    inializeAccomodationIDOnNavbar();

    setInterval(function () {

        /**
         * Számlázási tétel törlése event
         */
        $(".delete_billingitem").on("click", function () {

            let parent_row = $(this).closest("tr")[0];

            $("#delete_billingitem_modal").click(function () {

                deleteBillingItem($(parent_row).attr("id"));
                $(parent_row).fadeOut();

            });
        });

        /**
         * Számlázási tétel módosítása event
         */
        $(".update_billingitem").on("click", function () {

            let parent_row = $(this).closest("tr")[0];
            let name = $(parent_row).find(".row_name")[0];
            let price = $(parent_row).find(".row_price")[0];
            let row_select = $(parent_row).find(".row_select")[0];

            updateBillingItem({
                "id": $(parent_row).attr("id"),
                "name": $(name).html(),
                "price": $(price).html(),
                "category": $($(row_select).find(".browser-default")[0]).val()
            });

        });

        /**
         * Számlázási tétel létrehozása event
         */
        $('.insert_billingItem').on("click", function () {

            let parent_row = $(this).closest("tr")[0];
            let name = $(parent_row).find(".row_name")[0];
            let price = $(parent_row).find(".row_price")[0];
            let row_select = $(parent_row).find(".row_select")[0];

            createBillingItem({
                "name": $(name).html(),
                "price": $(price).html(),
                "category": $(row_select).val()
            });

        });

        /**
         * Szoba törlése event
         */
        $(".delete_room").on("click", function () {

            let parent_row = $(this).closest("tr")[0];

            $("#delete_room_modal").click(function () {

                deleteRoom($(parent_row).attr("id"));
                $(parent_row).fadeOut();
            });

        });

        /**
         * Szoba módosítása event
         */
        $(".update_room").on("click", function () {

            let parent_row = $(this).closest("tr")[0];
            let name = $(parent_row).find(".row_room_name")[0];
            let number = $(parent_row).find(".row_room_number")[0];
            let capacity = $(parent_row).find(".row_room_capacity")[0];
            let category = $(parent_row).find(".row_roomcat_select")[0];

            updateRoom({
                "id": $(parent_row).attr("id"),
                "name": $(name).html(),
                "number": $(number).html(),
                "capacity": $(capacity).html(),
                "category": $($(category).find(".browser-default")[0]).val()
            });

        });

        /**
         * Szoba létrehozása event
         */
        $(".insert_room").on("click", function () {

            let parent_row = $(this).closest("tr")[0];
            let name = $(parent_row).find(".row_room_name")[0];
            let number = $(parent_row).find(".row_room_number")[0];
            let capacity = $(parent_row).find(".row_room_capacity")[0];
            let category = $(parent_row).find(".row_select")[0];

            createRoom({
                "name": $(name).html(),
                "number": $(number).html(),
                "capacity": $(capacity).html(),
                "category": $(category).val()
            });

        });

    }, 500);

    /**
     * Szálláshely adatainak módosítása event
     */
    $(document).on("click", "#updateCompanyData", function (event) {

        /*
         * submit alapértelmezett működése letitva, hogy ajax kéréssel történjen a módosítás
         */
        event.preventDefault();
        updateAccomodationData();
    });

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
    
    let url="";
    
    let page_item= $('.page_link').click(function(){
       url= "../ajax_urls/select_billingitem.php?page=2" ;
    });
    
    
    if (true){
        
    }

    $.ajax({
        url: "../ajax_urls/select_billingitem.php?page=2",
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
function updateBillingItem(object) {

    $.ajax({
        url: "../ajax_urls/update_billingitem.php",
        method: "post",
        data: object,
        dataType: "TEXT",
        error: function (xhr)
        {
            alert(xhr.status);
        }
    });
}

/*
 * Szoba adatait adatbázisban módosító metódus
 */
function updateRoom(object) {

    $.ajax({
        url: "../ajax_urls/update_room.php",
        method: "post",
        data: object,
        dataType: "TEXT",
        success: function () {
            getRooms();
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
function deleteBillingItem(id) {

    $.ajax({
        url: "../ajax_urls/delete_billingitem.php",
        method: "post",
        data: {
            "id": id
        },
        dataType: "TEXT",
        error: function (xhr)
        {
            alert(xhr.status);
        }
    });

}

/*
 * Kijelölt szobát adatbázisból törlő metódus
 */
function deleteRoom(id) {

    $.ajax({
        url: "../ajax_urls/delete_room.php",
        method: "post",
        data: {
            "id": id
        },
        dataType: "TEXT",
        error: function (xhr)
        {
            alert(xhr.status);
        }
    });
}

/*
 * Új számlázási tétel felvitele adatbázisba
 */
function createBillingItem(object) {

    $.ajax({
        url: "../ajax_urls/create_billingitem.php",
        method: "post",
        data: object,
        dataType: "TEXT",
        success: function () {
            getBillingItems();
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
function createRoom(object) {

    $.ajax({
        url: "../ajax_urls/create_room.php",
        method: "post",
        data: object,
        dataType: "TEXT",
        success: function () {
            getRooms();
        },
        error: function (xhr)
        {
            alert(xhr.status);
        }
    });
}
