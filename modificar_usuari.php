<?php

    $usuaris =  "/var/www/html/users/usuaris.txt";
    
    $llegir_fitxer = fopen($usuaris,"r") or die ("No s'ha pogut obrir el fitxer");

    $name = $_POST["user_n"];
    $password = $_POST["pwd"];

    $f = file_get_contents($usuaris);
    $log = explode("\n",$f);
    
    foreach ($log as $i =>$key) {
		$revisar = $log[$i];
		$nom_user = explode(":",$revisar);
		if ($nom_user[0] == $name){
			$info =$name.":".$password;
            $log[$i] = $info;
            $modificat = 1;
		}
    }

    $canvis = implode("\n",$log);

    if($modificat = 1){
        $df = fopen($usuaris,"w") or die("No s'ha pogut obrir el fitxer d'articles");
        fwrite($df,$canvis."\n");
        fclose($df);
        echo ("Usuari modificat correctament");
    }

?>