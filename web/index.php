<?php
session_start();
if (isset($_SESSION['accomodation'])) {
    header('Location: mainmenu.php');
}
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8"/>
        <title>Bejelentkezés | Virtual Receptionist</title>
        <?php require_once('../templates/head.html'); ?>
    </head>
    <body>
        <div class="container">
            <img id="logo" src="../img/virtual_receptionist_mask.png" alt="virtual_receptionist_logo"/>
            <form method="post" action="login.php">
                <div class="box" class="form-group" id="login-box">
                    <h3>Adminisztrációs felület</h3>
                    <input type="text" name="accomodationID" id="accomodationID" class="form-control" placeholder="Szálláshely azonosító" required/>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Jelszó" required/>
                    <input type="submit" name="login" id="login" class="btn btn-primary" value="Bejelentkezés"/>
                    <span><input type="checkbox" value=""/>Maradjon bejelentkezve</span>
                    <a id="forgotPassword" href="#" data-toggle="tooltip" data-placement="right" title="Itt megadhat újat!">
                        <span>Elfelejtette jelszavát?</span>
                    </a>
                </div>
            </form>
            <div id="registration">
                <a href="registration.php" data-toggle="tooltip" data-placement="right" title="Itt megteheti!">
                    <span>Még nem regisztrálta szálláshelyét?</span>
                </a>
            </div>
        </div>
        <?php require_once('../templates/footer.php'); ?>
    </body>
</html>
