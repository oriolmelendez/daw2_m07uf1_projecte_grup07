<?php
    session_start();

    $name = $_POST["user_n"];
    
?>

<html>

    <head>
        <script type='text/javascript' src='esborrarUsuari.js'></script>
    </head>

    <form>
        <h1>Estas segur que vols esborrar l'usuari => <?php echo $name ?></h1>
        <input id='user_n' name='user_n' type='hidden' value= <?php echo $name ?>><br>
        <input type='button' value='Elimina' onclick= "esbUsuari();" />
    </form>

</html>

