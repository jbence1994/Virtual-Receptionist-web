<!DOCTYPE html>
<html lang="hu">
    <head>
        <title>Bejelentkezés | Virtual Receptionist</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>        
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="../css/main.css"/>
        <script src="../js/main.js" type="text/javascript"></script>
        <link rel="icon" href="../img/favicon.png" type="image/x-icon"/>
    </head>
    <body>
        <div class="container">
            <div class="logo">
                <img src="../img/vr-logo.png" alt="logo"/>
            </div>
            <form>
                <div class="form-group" id="login-box">
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
                <a href="#" data-toggle="tooltip" data-placement="right" title="Itt megteheti!">
                    <span>Még nem regisztrálta szálláshelyét?</span>
                </a>
            </div>
        </div>
        <?php require_once('../templates/footer.html'); ?>
    </body>
</html>
