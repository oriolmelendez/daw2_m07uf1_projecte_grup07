<?php
ob_start();
session_start();

$afegir = $_POST["afegir"];
$eliminar = $_POST["eliminar"];
$comandaName = $_POST["comandaName"];
//$nom = $_SESSION["user_name"];

if(isset ($_SESSION["nomUser"])){
    $nom = $_SESSION["nomUser"];
}else{
    $nom = $_SESSION["user_name"];
}

echo $afegir . "<br>";
echo $eliminar . "<br>";
echo $comandaName . "<br>";
if (!empty($afegir)) {    
    if (preg_match("/[a-z]/i", $afegir)) {
       header('Location: modificarComanda.php');
        ob_end_flush();
        exit;
    }
}
if (!empty($eliminar)) {

    if (preg_match("/[a-z]/i", $eliminar)) {
         header('Location: modificarComanda.php');
        ob_end_flush();
        exit;
    }
}

// array con los id dels productes
$afegir = explode(',', $afegir);
$eliminar = explode(',', $eliminar);

$articles = "fitxers/articles.txt";
$llegir_fitxer = fopen($articles, "r") or die("No s'ha pogut obrir el fitxer");

$f = file_get_contents($articles);
$log = explode("\n", $f);
$arrAdd = array();

var_dump($afegir);
var_dump($eliminar);
echo "<br>############################<br>";
// Tots els productes SENSE segmentar
var_dump($log);
if(!empty($afegir)){
    $cmtAdd = 0;
    foreach ($log as $i) {
        $vars = explode(',', $i);
        var_dump($vars);
    
        if (in_array($vars[0], $afegir)) {
            $cmtAdd++;
        }
    }
    if ($cmtAdd != sizeof($afegir) && sizeof($afegir) != 0) {
        //trigger ERROR
       // echo sizeof($afegir);
        /*header('Location: modificarComanda.php');
        ob_end_flush();
        exit;*/
    }
    
    foreach ($log as $i) {
        $vars = explode(',', $i);
        foreach ($afegir as $af)
            if ($vars[0] == $af) {
                $arrAdd[] = $i;
            }
    }
}

echo "<br><br><br>############################<br><br><br><br>";
var_dump($arrAdd);
echo "<br><br><br>############################<br><br><br><br>";

$doc = "fitxers/comandes/" . $nom . "/" . $comandaName;
echo $doc;
$df = fopen($doc, "r") or die("L'article no s'ha pogut crear");
$fileComanda = file_get_contents($doc);
// articles de la comanda
$articlesComanda = explode("\n", $fileComanda);
array_pop($articlesComanda);
var_dump($articlesComanda);
fclose($df);

if(!empty($eliminar)){
    foreach ($eliminar as $elim) {
        $cmptEl = 0;
        foreach ($articlesComanda as $articl) {
            $ar = explode(',', $articl);
    
            if ($elim == $ar[0]) {
                array_splice($articlesComanda, $cmptEl, 1);
                break;
            }
            $cmptEl++;
        }
    }
    
}



echo "<br><br><br>############################<br><br><br><br>";
var_dump($articlesComanda);


$arrayFinal = array_merge($articlesComanda, $arrAdd);

echo "<br><br><br>############################<br><br><br><br>";
var_dump($arrayFinal);

$df = fopen($doc, "w") or die("L'article no s'ha pogut crear");
foreach ($arrayFinal as $article) {
    fwrite($df, $article . "\n");
}
fclose($df);


header('Location: main_user.php');
ob_end_flush();
exit;