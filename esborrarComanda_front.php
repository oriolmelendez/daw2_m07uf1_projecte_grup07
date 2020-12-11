<?php

    session_start();
    $_SESSION["user_name"];
?>

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style_catalegAdmin.css">
        <script type="text/javascript" src="esborrarComanda.js"></script>
    </head>

    <body>
        
        <nav>
            <ul id="navigation">
                <li><a href="main_user.php" class="first">Cataleg &raquo;</a>
                    <ul>
                        <li><a href="afegirArticle_front.php">Afegir Producte</a></li>
                        <li><a href="modificarArticle_front.php">Modificar Producte</a></li>
                        <li><a href="esborrarArticle_front.php">Eliminar Producte</a></li>
    
                    </ul>
                <li><a class="first">Comandes &raquo;</a>
                    <ul>
                        <li><a href="modificarComanda.php">Modifica</a></li>
                        <li><a href="esborrarComanda_front.php">Elimina</a></li>
                    </ul>
                <li><a href="espaiPersonal.php">Espai personal</a></li>
                <li><a href="logout.php">Log Out</a></li>
        </nav>

        <div>
            <h1>Eliminació de comandes</h1>
            <form id="comanda">
                <label>Comanda a esborrar:</label>
                <input id= "numC" name="numC" type="text" placeholder="Ex: 1012201510140"><br><br>
                <input type="button" value="Elimina" onclick="esbComanda();" />
            </form>
        </div>

        <div>
            <h3>Visualització de comandes</h3>

            <?php
                $comandes = opendir("/var/www/html/fitxers/comandes/".$_SESSION["user_name"]."");

                while($comandes_usuari = readdir($comandes)){
                    if($comandes_usuari == '.' || $comandes_usuari == '..' ){
                        continue;
                    }
                    echo $comandes_usuari."<br/>";
                    $com = "/var/www/html/fitxers/comandes/".$_SESSION["user_name"]."/".$comandes_usuari;
                    $c = fopen("/var/www/html/fitxers/comandes/".$_SESSION["user_name"]."/".$comandes_usuari,"r") or die ("No s'ha pogut obrir el fitxer");
                    echo file_get_contents($com)."<br/>";
                    echo "<br/>";
                    fclose($c);
                }
            ?>
        </div>

    </body>

</html>