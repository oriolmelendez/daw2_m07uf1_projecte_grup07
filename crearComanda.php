<?php

    ob_start();
    session_start();

    require_once("class/Comanda.php");

    //$nom = "userTest";//
    $nom = $_SESSION["user_name"];
    $carret = $_SESSION["carret"];
    //echo $_SESSION["carret"];

    $doc = "fitxers/comandes/".$nom."/";

    // Initialize filecount variavle 
    $num = 0;

    $files2 = glob($doc . "*");

    if ($files2) {
        $num = count($files2);
    }

    date_default_timezone_set('CET');

    $id = date("dmyHis");

    $info = $id . "," . $nom . "," . $num . "," . $carret;
    $cmd = new Comanda($id, $nom, $num, $carret);
    $cmd->AfegeixComanda($info);
    echo ("Comanda creada correctament");
    $_SESSION['carret'] = array();

    header('Location: main_user.php');
    ob_end_flush();
    exit;

?>