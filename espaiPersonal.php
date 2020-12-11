<?php

    session_start();
    $_SESSION["user_name"];

    if (isset($_SESSION["carret"])) {
        $carret = $_SESSION["carret"];
    } else {
        $carret = array();
    }

    $usuaris = "/var/www/html/users/usuaris.txt";
    $f = file_get_contents($usuaris);

    $dir_com = "/var/www/html/fitxers/comandes/".$_SESSION["user_name"]."";

?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style_catalegAdmin.css">

    </head>

    <body>
        <nav>
            <ul id="navigation">
                <li><a href="main_user.php" class="first">Cataleg</a>
                <li><a>Comandes &raquo;</a>
                    <ul>
                        <li><a href="modificarComanda.php">Modifica</a></li>
                        <li><a href="esborrarComanda_front.php">Elimina</a></li>
                    </ul>
                <li><a href="espaiPersonal.php">Espai personal</a></li>
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
            </ul>
        </nav>
        
        <?php

            $log = explode("\n",$f);

            foreach ($log as $i =>$key) {
                $revisar = $log[$i];
                $dadesU = explode(":",$revisar);
                if ($_SESSION["user_name"] == $dadesU[0]){
                    echo "<h1>Dades usuari => ".$_SESSION["user_name"]."</h1>";
                    echo "<h4>Nom d'usuari: ".$dadesU[0]."</h4>";
                    echo "<h4>Nom: ".$dadesU[2]."</h4>";
                    echo "<h4>Cognoms: ".$dadesU[3]."</h4>";
                    echo "<h4>Direccio: ".$dadesU[4]."</h4>";
                    echo "<h4>Correu electrònic: ".$dadesU[5]."</h4>";
                    echo "<h4>Telèfon: ".$dadesU[6]."</h4>";
                    echo "<h4>Visa: ".$dadesU[7]."</h4>";
                }
            }

            if (is_dir($dir_com) == false){
                echo "<h1>L'usuari ".$_SESSION["user_name"]." no ha fet cap comanda.</h1>";
            }else{
                $comandes = opendir("/var/www/html/fitxers/comandes/".$_SESSION["user_name"]."");
                
                echo "<h1>Comandes de l'usuari => ".$_SESSION["user_name"]."</h1>";

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
            }

        ?>
        
    </body>

</html>