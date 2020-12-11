<?php 
ob_start();
session_start();


$comanda = $_POST["comandaMod"];

$_SESSION["user_name"];

if($_SESSION["user_name"] == "admin"){
    $c = explode(":",$comanda);

    $_SESSION["comandaMod"] = $c[1];
    $_SESSION["nomUser"] = $c[0];
}else{
    $_SESSION["comandaMod"] = $comanda;
}


header('Location: comandaModificada.php');
ob_end_flush();
exit;
?>