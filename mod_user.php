<?php
    session_start();

    $name = $_POST["user_n"];

    echo "<html>
        <form action='modificar_usuari.php' method='POST'>
            <h1>Modificar password => $name </h1>
            <h3>Nou password:</h3>
            <input name='pwd' type='text'><br>
            <input name='user_n' type='hidden' value=".$name."><br>
            <input type='submit' value='Modificar'>
        </form>
    </html>"
    
?>

