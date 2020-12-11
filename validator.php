<?php

    $fitxer_usuaris = "/var/www/html/users/usuaris.txt";
    $llegir_fitxer = fopen($fitxer_usuaris,"r") or die ("L'usuari no s'ha pogut validar");

    $usr = $_POST["usuari"];
    $pwd = $_POST["password"];

    //echo(var_dump($pwd));

    while(!feof($llegir_fitxer)){
        $log = explode(":",fgets($llegir_fitxer));

        if($usr== $log[0] && trim($log[1])==$pwd){
            
            if($usr == "admin"){
                session_start();
                $_SESSION["user_name"] = $usr;
                header('Location: /main_admin.php');
                break;
            }else{
                header('Location: /main_user.php');
                session_start();
                $_SESSION["user_name"] = $usr;
                break;
            }
            
        }

    }  
    fclose($llegir_fitxer);

   
    
?>

