<?php

    session_start();

?>

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style_catalegAdmin.css">
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
                        <li><a href="esborrarComanda_front.php">Elimina</a></li>
                    </ul>
                <li><a href="gestio_usuaris.php">Gestió usuaris</a></li>
                <li><a href="logout.php">Log Out</a></li>
        </nav>

        <div>
        <h1>Visualització de comandes</h1>

            <?php
                $dir_c = "/var/www/html/fitxers/comandes";
            
                $comandes = opendir("/var/www/html/fitxers/comandes");
                
                while($com_usuaris = readdir($comandes)){
                    if($com_usuaris == '.' || $com_usuaris == '..' ){
                        continue;
                    }
                    echo "<br/>".$com_usuaris."<br/>";
                    $comandes_usr = "/var/www/html/fitxers/comandes/".$com_usuaris."/";
                    $llegir_comandes_usr = opendir("/var/www/html/fitxers/comandes/".$com_usuaris);
                    while($c = readdir($llegir_comandes_usr)){
                        if($c == '.' || $c == '..' ){
                            continue;
                        }
                        echo "<br/>".$c."<br/>";
                    
                        $llegir_com_usuari = fopen($comandes_usr.$c ,"r") or die ("No s'ha pogut obrir el fitxer");
                        echo file_get_contents($comandes_usr.$c)."<br/>";
                        fclose($llegir_com_usuari);
                    }
                }
            ?>
        </div>

    </body>

</html>