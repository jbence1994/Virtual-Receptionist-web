<?php require_once('../config/isloggedin.php'); ?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <title>Főmenü | Virtual Receptionist</title>
        <?php require_once('../templates/head.html'); ?>
    </head>
    <body>
        <?php require_once('../templates/navbar.html'); ?>
        <section>
            <article>
                <h1>Szálláshely adatainak beállítása</h1>
            </article>
            <article>
                <h1>Szobák beállítása</h1>
            </article>
            <article>
                <h1>Számlázási tételek beállítása</h1>
            </article>
            <article>
                <h1>Naptár</h1>
            </article>
            <article>
                <h1>Naplózás</h1>
            </article>
        </section>
        <?php require_once('../templates/footer.html'); ?>
    </body>
</html>
