<?php

    require("config/config.php");

    //Munkamenet indítása
    session_start();

    //Ha nincs belépve, akkor átirányít a kezdőlapra
    if (!isset($_SESSION["felhasznalonev"])) {
        echo "<script type=\"text/javascript\">document.location.href=\"index.php\"</script>";
    }

    //Ha be van lépve, megjelenik az oldal
    else {
        //Változók törlése
        unset($_SESSION["id"]);
        unset($_SESSION["felhasznalonev"]);
        unset($_SESSION["vezeteknev"]);
        unset($_SESSION["keresztnev"]);

        //Munkamenet leállítása
        session_destroy();
        $_SESSION = [];

        //Átirányítás a kezdőlapra
        echo "      <script type=\"text/javascript\">document.location.href=\"index.php\"</script>";
    }

?>