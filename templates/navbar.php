<?php require_once('../config/connect.php'); ?>
<nav class="navbar bg-dark navbar-dark sticky-top">
    <a class="navbar-brand" href="../web/mainmenu.php">Virtual Receptionist konfigurációs felület (<?php echo($accomodationName . ' / ' . $vat . '/'); ?>)</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../web/setrooms.php">Szobák beállítása</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../web/setbilling.php">Számlázási tételek beállítása</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../web/setaccomodation.php">Szálláshely adatainak beállítása</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../web/log.php">Naplózás megtekintése</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../web/logout.php">Kijelentkezés</a>
            </li>
        </ul>
    </div>
</nav>
