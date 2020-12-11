<?php
    session_start();
?>

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style_catalegAdmin.css">
        <link rel="stylesheet" type="text/css" href="css/style_Article.css">
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
                        <li><a href="/M07/projecte/modifica.html">Modifica</a></li>
                        <li><a href="esborrarComanda_front.php">Elimina</a></li>
                    </ul>
                <li><a href="gestio_usuaris.php">Gestió suaris</a></li>
                <li><a href="logout.php">Log Out</a></li>
        </nav>

        <div>
            <h1>Modificar producte</h1>

            <form action="modificarArticle.php" method="POST">
                <label>Article a modificar:</label>
                <input name="article" type="text" placeholder="Ex: 17323"><br><br>
                <h3>Noves dades:</h3>
                <label>Nom:</label>
                <input name="nom" type="text" placeholder="Ex: MotherBoardGigabyte"><br>
                <label>Preu:</label>
                <input name="preu" type="text" placeholder="Ex: 200"><br>
                <label>Imatge:</label>
                <input name="imatge" type="text" placeholder="Ex: img/gtx1050.img"><br>
                <input id="bmod" type="submit" value="Modificar">
                
            </form>
        </div>

    </body>

</html>