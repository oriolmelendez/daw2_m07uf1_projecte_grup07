<?php
    session_start();
?>
<html> 

    <head> 
        <meta charset="utf-8" /> 
        <link rel="stylesheet" type="text/css" href="css/style_catalegAdmin.css"> 
    </head> 

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
    <h1>Afegir un nou producte</h1>
        <p>*Els noms no poden contenir espais</p>
        <form action="afegirArticle.php" method="POST">
            <label>Identificador:</label>
            <input id="identificador" name="identificador" type="text" placeholder="Ex: 1003"><br>
            <label>Nom:</label>
            <input id="nom" name="nom" type="text" placeholder="Ex: MotherBoardGigabyte-B365"><br>
            <label>Preu:</label>
            <input id="preu" name="preu" type="text" placeholder="Ex: 250"><br>
            <label>Imatge:</label>
            <input id="imatge" name="imatge" type="text" placeholder="Ex: tomaquet.png"><br>
            <label>Secció:</label>
            <input id="seccio" name="seccio" type="text" placeholder="Ex: Fruita"><br>
            <input id="send" type="submit" value="Afegir">

        </form>
    </div> 

</html>