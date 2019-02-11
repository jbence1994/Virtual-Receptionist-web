<?php require_once('../config/isloggedin.php'); ?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8"/>
        <title>Főmenü | Virtual Receptionist</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>        
        <script src="../js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="../css/main.css"/>
        <script src="../js/main.js" type="text/javascript"></script>
        <link rel="icon" href="../img/favicon.png" type="image/x-icon"/>
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
