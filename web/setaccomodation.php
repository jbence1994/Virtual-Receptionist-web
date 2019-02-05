<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="utf-8">
        <title>Szálláshely adatainak beállítása | Virtual Receptionist</title>
        <meta charset="utf-8"/>
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
        <div id="box">
            <input type="text" name="accomodationID" id="accomodationID" class="form-control" placeholder="Szálláshely azonosító" required/>
            <input type="text" name="companyName" id="companyName" class="form-control" placeholder="Cégnév" required/>
            <input type="text" name="contact" id="contact" class="form-control" placeholder="Kapcsolattartó" required/>
            <input type="text" name="VATNumber" id="VATNumber" class="form-control" placeholder="Adószám" required/>
            <input type="text" name="headquarters" id="headquarters" class="form-control" placeholder="Székhely" required/>
            <input type="text" name="site" id="site" class="form-control" placeholder="Telephely" required/>
            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="Telefonszám" required/>
            <input type="text" name="emailAddress" id="emailAddress" class="form-control" placeholder="E-mail cím" required/>
            <input type="submit" id="updateCompanyData" name="updateCompanyData" class="btn btn-primary" value="Adatok módosítása"/>
        </div>
        <?php require_once('../templates/footer.html'); ?>
    </body>
</html>
