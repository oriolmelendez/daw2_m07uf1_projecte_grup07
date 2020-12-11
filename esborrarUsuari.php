<?php

    session_start();

    $usuaris = "/var/www/html/users/usuaris.txt";
    $usuarisTemp = "/var/www/html/users/usuarisTemp.txt";
    $llegir_fitxer = fopen($usuaris,"r") or die ("No s'ha pogut obrir el fitxer");
    $llegir_temp = fopen($usuarisTemp,"w") or die ("No s'ha pogut obrir el fitxer temporal");


    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

       $nom_usuari = $_REQUEST["q"];

        $f = file_get_contents($usuaris);
        $log = explode("\n",$f);

	    foreach ($log as $i =>$key) {
		    $revisar = $log[$i];
            $oldUsr = explode(":",$revisar);
            $info = $oldUsr[0].":".$oldUsr[1].":".$oldUsr[2].":".$oldUsr[3].":".$oldUsr[4].":".$oldUsr[5].":".$oldUsr[6].":".$oldUsr[7]."\n";

		    if ($oldUsr[0] != $nom_usuari){
		    	fwrite($llegir_temp,$info);
		    }
        }
    }

    unlink($usuaris);
    rename($usuarisTemp,$usuaris);
    fclose($usuaris);
    fclose($usuarisTemp);

?>
