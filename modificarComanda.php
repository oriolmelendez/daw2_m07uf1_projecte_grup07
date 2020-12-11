<?php
session_start();

$nom = $_SESSION["user_name"];

?>

<html>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style_catalegAdmin.css">
    <link rel="stylesheet" type="text/css" href="css/style_Article.css">
</head>

<body>
    <?php if($nom == "admin"){ 
        echo "<nav>
        <ul id='navigation'>
            <li><a href='main_admin.php' class='first'>Cataleg &raquo;</a>
                <ul>
                    <li><a href='afegirArticle_front.php'>Afegir Producte</a></li>
                    <li><a href='modificarArticle_front.php'>Modificar Producte</a></li>
                    <li><a href='esborrarArticle_front.php'>Eliminar Producte</a></li>

                </ul>
            <li><a class='first'>Comandes &raquo;</a>
                <ul>
                    <li><a href='visualitzaComandes.php'>Visualitza</a></li>
                    <li><a href='modificarComanda.php'>Modifica</a></li>
                    <li><a href='esborrarComandaAdmin_front.php'>Elimina</a></li>
                </ul>
            <li><a href='gestio_usuaris.php'>Gestió Usuaris</a></li>
            <li><a href='logout.php'>Log Out</a></li>
        </nav>";
        }else{
        echo"
            <nav>
            <ul id='navigation'>
            <li><a href='main_user.php' class='first'>Cataleg &raquo;</a>
            <li><a class='first'>Comandes &raquo;</a>
                <ul>
                    <li><a href='modificarComanda.php'>Modifica</a></li>
                    <li><a href='esborrarComanda_front.php'>Elimina</a></li>
                </ul>
            <li><a href='espaiPersonal.php'>Espai personal</a></li>
            <li><a href='logout.php'>Log Out</a></li>
        </nav>";

        }
    ?>
    
    <div>
        <h1>Modificar producte</h1>

        <form action="modificarComandaEscollida.php" method="POST">
            <label>Comanda a modificar:</label>

            <select name="comandaMod">
                <?php

                    if($nom == "admin"){

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
                            //echo file_get_contents($comandes_usr.$c)."<br/>";
                            echo '<option value="' .$com_usuaris. ":" . $c . '">' . $c . '</option>';
                            fclose($llegir_com_usuari);
                        }
                    }

                }else{
                    $dir_com = "fitxers/comandes/" . $nom . "/";

                    if (is_dir($dir_com) == false) {
                        echo "<h1>L'usuari " . $nom . " no ha fet cap comanda.</h1>";
                    } else {
                    $comandes00 = opendir("fitxers/comandes/" . $nom);

                    while ($comandes_usuari00 = readdir($comandes00)) {
                        if ($comandes_usuari00 == '.' || $comandes_usuari00 == '..') {
                            continue;
                        }
                        echo '<option value="' . $comandes_usuari00 . '">' . $comandes_usuari00 . '</option>';
                    }
                    fclose($c);
                    }
                }

                

                ?>

            </select>
            <p><input type="submit" value="Enviar"></p>
        </form>
        <?php

        $dir_c = "fitxers/comandes/" . $nom . "/";

        $comandes = opendir("fitxers/comandes");

        while ($com_usuaris = readdir($comandes)) {
            if ($com_usuaris == '.' || $com_usuaris == '..') {
                continue;
            }
            $comandes_usr = "fitxers/comandes/" . $com_usuaris . "/";
            $llegir_comandes_usr = opendir("fitxers/comandes/" . $com_usuaris);
            while ($c = readdir($llegir_comandes_usr)) {
                if ($c == '.' || $c == '..') {
                    continue;
                }
                echo "<br/>" . $c . "<br/>";

                $llegir_com_usuari = fopen($comandes_usr . $c, "r") or die("No s'ha pogut obrir el fitxer");
                echo file_get_contents($comandes_usr . $c) . "<br/>";
                fclose($llegir_com_usuari);
            }
        }
        ?>

    </div>

</body>

</html>