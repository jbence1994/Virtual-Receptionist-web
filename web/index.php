<?php
session_start();
if (isset($_SESSION['accomodation'])) { // Süti létezik-e?
    header('Location: mainmenu.php');
}
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <title>Bejelentkezés | Virtual Receptionist</title>
        <?php require_once('../templates/head.html'); ?>
    </head>
    <body>
        <div class="container">
            <?php require_once('../templates/login_index_page.html'); ?>
        </div>
        <?php require_once('../templates/footer.php'); ?>
    </body>
</html>
