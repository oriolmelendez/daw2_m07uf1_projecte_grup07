<?php
    session_start();
?>

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style_catalegAdmin.css">
        <link rel="stylesheet" type="text/css" href="css/style_Article.css">
        <script type="text/javascript" src="esborrarArticle.js"></script>
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
                        <li><a href="esborrarComanda_front.php">Elimina</a></li>
                    </ul>
                <li><a href="gestio_usuaris.php">Gestió suaris</a></li>
                <li><a href="logout.php">Log Out</a></li>
        </nav>

        <div>
            <h1>Eliminar producte</h1>

            <form id="comanda">
                <label>Article a modificar:</label>
                <input id= "num_art" name="num_art" type="text" placeholder="Ex: 17323"><br><br>
                <input type="button" value="Elimina" onclick="esbArticle();" />
            </form>
        </div>

    </body>

</html>