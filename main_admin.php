<?php
//include "objectes.php";
session_start();


if (isset($_SESSION["carret"])) {
    $carret = $_SESSION["carret"];
} else {
    $carret = array();
}

if (isset($_SESSION["seccio"])) {
    $seccio = $_SESSION["seccio"];
} else {
    $seccio = "Tots";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style_catalegAdmin.css">
    <title>Projecte M07</title>
    
</head>

<body>
    <nav>
        <ul id="navigation">
            <li><a href="main_admin.php" class="first">Cataleg &raquo;</a>
                <ul>
                    <li><a href="afegirArticle_front.php">Afegir Producte</a></li>
                    <li><a href="modificarArticle_front.php">Modificar Producte</a></li>
                    <li><a href="esborrarArticle_front.php">Eliminar Producte</a></li>

                </ul>
            <li><a class="first">Comandes &raquo;</a>
                <ul>
                    <li><a href="visualitzaComandes.php">Visualitza</a></li>
                    <li><a href="modificarComanda.php">Modifica</a></li>
                    <li><a href="esborrarComandaAdmin_front.php">Elimina</a></li>
                </ul>
            <li><a href="gestio_usuaris.php">Gestió Usuaris</a></li>
            <li><a href="logout.php">Log Out</a></li>
            <li><img src="/img/carret.jpeg" />
                <ul>
                    <?php
                        if(!empty($carret)){
                            foreach($carret as $value){
                                $vars = explode(',', $value);
                                echo '<form name="afegirAlCarret" action="afegirAlCarret.php" method="POST">';
                                echo '<li>Producte:'.$vars[1].'<br>';
                                echo 'Secció:'.$vars[4].'<br>';
                                echo 'Preu:'.$vars[2].'<br>';
                                echo '<input type="hidden" name="identificador" value="'.$vars[0].'" />';
                                echo '<input type="submit" name="Submit" value="Esborra" /></li></form>';
                            }
                            echo '<form name="crearComanda" action="crearComanda.php" method="POST">';
                            echo '<input type="submit" name="Submit" value="Finalitza" /></form>';
                        
                        }else{
                            echo '<li>El carret esta buit</li>';
                        }
                    ?>
                </ul>
            </li>
    </nav>

    <form name="canviarSeccio" action="selectSection.php" method="POST">
        <p>Quines seccions vols mostrar?</p>
        <select name="seccio">
        <option value="Tots">Tots</option>
            <?php

            $articles = "fitxers/articles.txt";
            $llegir_fitxer = fopen($articles, "r") or die("No s'ha pogut obrir el fitxer");

            $f = file_get_contents($articles);
            $log = explode("\n", $f);

            $jaPosat = array();

            foreach ($log as $i) {
                $vars = explode(',', $i);
                if (!in_array($vars[4], $jaPosat)) {
                    echo '<option value="' . $vars[4] . '">' . $vars[4] . '</option>';
                    $jaPosat[] = $vars[4];
                }
            }
            ?>

        </select>
        <p><input type="submit" value="Enviar"></p>
    </form>

    <div class="grid">
        <?php
        $articles = "fitxers/articles.txt";
        $llegir_fitxer = fopen($articles, "r") or die("No s'ha pogut obrir el fitxer");

        $f = file_get_contents($articles);
        $log = explode("\n", $f);


        foreach ($log as $i) {
            $vars = explode(',', $i);
            if ($seccio == $vars[4] || $seccio == "Tots") {
                echo '<form name="afegirAlCarret" action="afegirAlCarret.php" method="POST"><div class="card">';
                echo  '<img src="' . $vars[3] . '" alt="' . $vars[1] . '" style="width:5%">';
                echo '<h1>' . $vars[1] . '</h1>';
                echo '<h2>' . $vars[4] . '</h2>';
                echo '<p class="price">' . $vars[2] . '€</p></div>';
                echo '<input type="hidden" name="identificador" value="' . $vars[0] . '" />';
                echo '<input type="submit" name="Submit" value="Afegeix al carret" /></form>';
            }
        }
        ?>
    </div>

</body>

</html>