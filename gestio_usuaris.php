<?php

    session_start();

    $usuaris = "/var/www/html/users/usuaris.txt";
    $llegir_fitxer = fopen($usuaris,"r") or die ("No s'ha pogut obrir el fitxer");

    $f = file_get_contents($usuaris);
    
?>

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style_catalegAdmin.css">
        <script type="text/javascript" src="esborrarUsuari.js"></script>
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
                <li><a>Comandes &raquo;</a>
                    <ul>
                        <li><a href="visualitzaComandes.php">Visualitza</a></li>
                        <li><a href="modificarComanda.php">Modifica</a></li>
                        <li><a href="esborrarComandaAdmin_front.php">Elimina</a></li>
                    </ul>
                <li><a href="gestio_usuaris.php">Gestió usuaris</a></li>
                <li><a href="logout.php">Log Out</a></li>
        </nav>

        <div>
            <h1>Gestió d'usuaris</h1>

            <table border="1px">
               
            <?php
                    $user = explode("\n",$f);
                    
                    foreach($user as $u => $key){
                        $usrs = $user[$u];
                        
                        $only_name = explode(":",$usrs);
                        
                        for($i = 0; $i < 2; $i= $i+2){
                            echo "<tr>
                                    <td>".$only_name[$i]."</td>
                                    <form action='mod_user.php' method='POST'><td><button type='submit' name='user_n' value=".$only_name[$i].">Modificar</button></td></form>
                                    <form action='esb_user.php' method='POST'><td><button type='submit' name='user_n' value=".$only_name[$i].">Esborrar</button></td></form>
                                </tr>";
                        }
                    }
                    fclose($llegir_fitxer);
                    //<form><td><button type='submit' name='user_n' onclick='esbUsuari(".$only_name[$i].")'>Esborrar</button></td></form>

                ?>
                
            </table>
            
        </div>

    </body>

</html>