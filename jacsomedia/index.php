<?php

    require ("config\config.php");

    //A lehetséges szavak
    $lehetseges_szavak = array("DOG", "CAT", "FROG", "COW", "SHEEP", "LION", "POUND", "FISH", "FOOT", "MILK", "SUPER", "HEART");

    function mentes() {
        //Kapcsolódás adatbázishoz
        $kapcsolat = new mysqli(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD, MYSQL_DB);

        //Ha nem lehet kapcsolódni, akkor hibaüzenetet ad
        if ($kapcsolat -> connect_error) {
            die("Kapcsolódás hiba: " . $kapcsolat -> connect_error);
        }

        global $lehetseges_szavak;

        //A belépett felhasználó listájának mentése
        //SQL utasítás
        for($i = 1; $i <= 24; $i++) {
            $name = "sql_utasitas_{$i}";
            if (strcmp($_POST["mezo_" . $i], "") != 0)
                $$name = "UPDATE szavak SET szo = " . (array_search ($_POST["mezo_" . $i], $lehetseges_szavak) + 1) . " WHERE felhasznalo = " . $_SESSION["id"] . " AND mezo = " . $i;
            else {
                $$name = "UPDATE szavak SET szo = NULL WHERE felhasznalo = " . $_SESSION["id"] . " AND mezo = " . $i;
            }
            echo $_POST["mezo_" . $i] . "<br />";
         }

        //SQL utasítás eredménye
        $eredmeny = $kapcsolat -> query($sql_utasitas_1);
        $eredmeny = $kapcsolat -> query($sql_utasitas_2);
        $eredmeny = $kapcsolat -> query($sql_utasitas_3);
        $eredmeny = $kapcsolat -> query($sql_utasitas_4);
        $eredmeny = $kapcsolat -> query($sql_utasitas_5);
        $eredmeny = $kapcsolat -> query($sql_utasitas_6);
        $eredmeny = $kapcsolat -> query($sql_utasitas_7);
        $eredmeny = $kapcsolat -> query($sql_utasitas_8);
        $eredmeny = $kapcsolat -> query($sql_utasitas_9);
        $eredmeny = $kapcsolat -> query($sql_utasitas_10);
        $eredmeny = $kapcsolat -> query($sql_utasitas_11);
        $eredmeny = $kapcsolat -> query($sql_utasitas_12);
        $eredmeny = $kapcsolat -> query($sql_utasitas_13);
        $eredmeny = $kapcsolat -> query($sql_utasitas_14);
        $eredmeny = $kapcsolat -> query($sql_utasitas_15);
        $eredmeny = $kapcsolat -> query($sql_utasitas_16);
        $eredmeny = $kapcsolat -> query($sql_utasitas_17);
        $eredmeny = $kapcsolat -> query($sql_utasitas_18);
        $eredmeny = $kapcsolat -> query($sql_utasitas_19);
        $eredmeny = $kapcsolat -> query($sql_utasitas_20);
        $eredmeny = $kapcsolat -> query($sql_utasitas_21);
        $eredmeny = $kapcsolat -> query($sql_utasitas_22);
        $eredmeny = $kapcsolat -> query($sql_utasitas_23);
        $eredmeny = $kapcsolat -> query($sql_utasitas_24);

        //Kapcsolat bezárása
        $kapcsolat -> close();

        //Tájékozatás a sikeres mentésről
        echo "<script>document.getElementById(\"sikeres_uzenet\").innerHTML = \"Your list has succesful saved.\";</script>";
    }

    function felhasznalonev_ellenorzes($parameter) {
        //Kapcsolódás adatbázishoz
        $kapcsolat = new mysqli(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD, MYSQL_DB);

        //Ha nem lehet kapcsolódni, akkor hibaüzenetet ad
        if ($kapcsolat -> connect_error) {
            die("Kapcsolódás hiba: " . $kapcsolat -> connect_error);
        }

        //Felhasználónevek lekérdezése
        //SQL utasítás
        $felhasznalok_sql_utasitas = "SELECT felhasznalonev FROM felhasznalok";
        //SQL utasítás eredménye
        $felhasznalok_eredmeny = $kapcsolat -> query($felhasznalok_sql_utasitas);
        while($felhasznalo = mysqli_fetch_assoc($felhasznalok_eredmeny))
           $felhasznalok[] = strtolower($felhasznalo["felhasznalonev"]);

        //Kapcsolat bezárása
        $kapcsolat -> close();

        //Eredmény
        $eredmeny = in_array($parameter, $felhasznalok);

        //Visszatérés az eredménnyel
        return $eredmeny;
    }

    function jelszo_ellenorzes($felhasznalonev_parameter, $jelszo_parameter) {
        //Kapcsolódás adatbázishoz
        $kapcsolat = new mysqli(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD, MYSQL_DB);

        //Ha nem lehet kapcsolódni, akkor hibaüzenetet ad
        if ($kapcsolat -> connect_error) {
            die("Kapcsolódás hiba: " . $kapcsolat -> connect_error);
        }

        //Felhasználónévhez tartozó jelszó lekérdezése
        //SQL utasítás
        $jelszo_sql_utasitas = "SELECT jelszo FROM felhasznalok WHERE felhasznalonev=\"" . $felhasznalonev_parameter . "\"";
        //SQL utasítás eredménye
        $jelszo_eredmeny = $kapcsolat -> query($jelszo_sql_utasitas);
	$jelszo = mysqli_fetch_assoc($jelszo_eredmeny)["jelszo"];

        //Kapcsolat bezárása
        $kapcsolat -> close();

        //Eredmény
        if (strcmp($jelszo_parameter, $jelszo) == 0)
            $eredmeny = true;
        else
            $eredmeny = false;

        //Visszatérés az eredménnyel
        return $eredmeny;
    }

    function statusz_ellenorzes($felhasznalonev_parameter) {
        //Kapcsolódás adatbázishoz
        $kapcsolat = new mysqli(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD, MYSQL_DB);

        //Ha nem lehet kapcsolódni, akkor hibaüzenetet ad
        if ($kapcsolat -> connect_error) {
            die("Kapcsolódás hiba: " . $kapcsolat -> connect_error);
        }

        //Felhasználónévhez tartozó státusz lekérdezése
        //SQL utasítás
        $statusz_sql_utasitas = "SELECT statusz FROM felhasznalok WHERE felhasznalonev=\"" . $felhasznalonev_parameter . "\"";
        //SQL utasítás eredménye
        $statusz_eredmeny = $kapcsolat -> query($statusz_sql_utasitas);
	$statusz = mysqli_fetch_assoc($statusz_eredmeny)["statusz"];

        //Kapcsolat bezárása
        $kapcsolat -> close();

        //Eredmény
        if (strcmp($statusz, "Aktív") == 0)
            $eredmeny = true;
        else
            $eredmeny = false;

        //Visszatérés az eredménnyel
        return $eredmeny;
    }

    function urlap_megjelenitese() {
        $tartalom = file_get_contents("html/index.html");
        $tartalom = str_replace("{%felhasznalonev%}", "", $tartalom);
        $tartalom = str_replace("{%jelszo%}", "", $tartalom);
        echo $tartalom;
    }

    //Munkamenet indítása
    session_start();

    //Ha már belépett, akkor megjelenik az oldal
    if (isset($_SESSION["felhasznalonev"])) {

        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['save'])) {
            mentes();
        }

        //Kapcsolódás adatbázishoz
        $kapcsolat = new mysqli(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD, MYSQL_DB);

        //Ha nem lehet kapcsolódni, akkor hibaüzenetet ad
        if ($kapcsolat -> connect_error) {
            die("Kapcsolódás hiba: " . $kapcsolat -> connect_error);
        }

        $felhasznalo = $_SESSION["id"];

        //A belépett felhasználó listájának beolvasása
        //SQL utasítás
        $sql_utasitas = "SELECT * FROM szavak WHERE felhasznalo = " . $felhasznalo;
        //SQL utasítás eredménye
        $eredmeny = $kapcsolat -> query($sql_utasitas);

        while($szo = mysqli_fetch_assoc($eredmeny))
           $szavak[] = array("mezo" => $szo["mezo"], "szo" => $szo["szo"]);

        //Kapcsolat bezárása
        $kapcsolat -> close();

        $tartalom = file_get_contents("html/index_2.html");

        foreach ($szavak as $szo)
            if (!is_null($szo["szo"]))
                $tartalom = str_replace("{%mezo_" . $szo["mezo"]. "%}", "<button id=\"" . strtolower($lehetseges_szavak[$szo["szo"] - 1]) . "\" class=\"gomb\" draggable=\"true\" ondragstart=\"atrakas(event)\">" . $lehetseges_szavak[$szo["szo"] - 1]. "</button>", $tartalom);
            else
                $tartalom = str_replace("{%mezo_" . $szo["mezo"]. "%}", "", $tartalom);

        echo $tartalom;
    }

    //Ha nincs belépve
    else {
        //Űrlap mezőkből PHP változó
        if (isset($_POST["felhasznalonev"]))
            $felhasznalonev = strtolower($_POST["felhasznalonev"]);
        else
            $felhasznalonev = NULL;
        if (isset($_POST["jelszo"]))
            $jelszo = sha1($_POST["jelszo"]);
        else
            $jelszo = NULL;

        //Ha az oldal először jelenik meg (Üres mind a két mező)
        if(!(isset($felhasznalonev) && isset($jelszo))) {
            //Megjeleníti az űrlapot
            urlap_megjelenitese();
        }
        //Ha létezik a felhasználónév, a jelszó megfelelő és a felhasználó státusza aktív
        else if(felhasznalonev_ellenorzes($felhasznalonev) && jelszo_ellenorzes($felhasznalonev, $jelszo) && statusz_ellenorzes($felhasznalonev)) {
            //Kapcsolódás adatbázishoz
            $kapcsolat = new mysqli(MYSQL_HOST, MYSQL_LOGIN, MYSQL_PASSWORD, MYSQL_DB);

            //Ha nem lehet kapcsolódni, akkor hibaüzenetet ad
            if ($kapcsolat -> connect_error) {
                die("Kapcsolódás hiba: " . $kapcsolat -> connect_error);
            }

            //Felhasználó adatainak lekérdezése
            //SQL utasítás
            $felhasznalo_adatai_sql_utasitas = "SELECT id, vezeteknev, keresztnev FROM felhasznalok WHERE felhasznalonev=\"" .  $felhasznalonev . "\"";
            //SQL utasítás eredménye
            $felhasznalo_adatai_eredmeny = $kapcsolat -> query($felhasznalo_adatai_sql_utasitas);
	    $adatok = mysqli_fetch_assoc($felhasznalo_adatai_eredmeny);

            //Kapcsolat bezárása
            $kapcsolat -> close();

            $_SESSION["id"] = $adatok["id"];
            $_SESSION["felhasznalonev"] = $felhasznalonev;
            $_SESSION["vezeteknev"] = $adatok["vezeteknev"];
            $_SESSION["keresztnev"] = $adatok["keresztnev"];

            //Átirányítás a kezdőlapra
            header("location: index.php");
        }
        //A felhasználónév nem létezik, a jelszó nem jó vagy a felhasználónévhez tartozó felhasználó státusza letiltott vagy nem visszaigazolt
        else {
            //Űrlap megjelenítése
            urlap_megjelenitese();

            //Hibaüzenet megjelenítése
            echo "<script>document.getElementById(\"belepesi_hiba\").innerHTML = \"Your user name or password was incorrect.<br />\\n            Please try it again.\\n\";</script>";
        }

    }

?>