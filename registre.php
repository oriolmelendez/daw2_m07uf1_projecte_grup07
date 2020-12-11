<?php

    require_once("class/Client.php");

    //Classe client que ereta de persona
    $doc = "/var/www/html/users/usuaris.txt";

    $usr = $_POST["usuari"];
    $pwd = $_POST["password"];
    $nom = $_POST["nom"];
    $cognoms = $_POST["cognoms"];
    $adreca = $_POST["adreca"];
    $mail = $_POST["mail"];
    $telf = $_POST["telf"];
    $visa = $_POST["visa"];

    $info = $usr.":".$pwd.":".$nom.":".$cognoms.":".$adreca.":".$mail.":".$telf.":".$visa;

    $u = new Client($usr,$pwd,$nom,$cognom,$adreca,$mail,$telf,$visa);
    $u -> AfegeixUsuari($info);
    echo("Usuari creat correctament");

?>