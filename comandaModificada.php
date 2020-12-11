<?php
session_start();

if(isset ($_SESSION["nomUser"])){
    $nom = $_SESSION["nomUser"];
}else{
    $nom = $_SESSION["user_name"];
}

$comandaNom = "";
?>

<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style_catalegAdmin.css">
    <link rel="stylesheet" type="text/css" href="css/style_Article.css">
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <nav>
        <ul id="navigation">
            <li><a href="cataleg_admin.php" class="first">Cataleg &raquo;</a>
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
            <li><a href="gestio_usuaris.php">Gestió suaris</a></li>
    </nav>

    <div>
        <table style="border: 1px solid black;">
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
                    if ($c != $_SESSION["comandaMod"]) {
                        continue;
                    }

                    echo "<br/> <p> Comanda nº " . $c . "</p><br/>";
                    $comandaNom = $c;
                    $llegir_com_usuari = fopen($comandes_usr . $c, "r") or die("No s'ha pogut obrir el fitxer");
                    $contingutComanda = file_get_contents($comandes_usr . $c) . "<br/>";
                    fclose($llegir_com_usuari);
                }
            }
            $log = explode("\n", $contingutComanda);

            $comandac = array();
            foreach ($log as $cmd) {
                if( !next( $log ) ) { 
                    continue;
                } 
                $cmds = explode(",", $cmd);
                echo "<tr>";

                foreach ($cmds as $i) {
                    echo "<th>" . $i . "</th>";
                }

                echo "</tr>";
            }


            ?>
        </table>

        <form action="comandaMod.php" method="POST"><br>
        <?php
        echo $c;
        echo "<input type='hidden' name='comandaName' value='".$comandaNom."'/>";
        ?>
            <label>Inserta els numeros ID dels productes a afegir, si vols afegir diversos separa'ls per una coma:</label><br>
            <input type="text" name="afegir" placeholder="Ex '15,05,36,95'"/><br>
            <label>Inserta els numeros ID dels productes a eliminar, si vols eliminar diversos separa'ls per una coma:</label><br>
            <input type="text" name="eliminar" placeholder="Ex '15,05,36,95'"/><br>
            <p><input type="submit" value="Enviar"></p>
        </form>
    </div>

</body>

</html>