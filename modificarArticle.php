<?php

    $articles = "/var/www/html/fitxers/articles.txt";
    $llegir_fitxer = fopen($articles,"r") or die ("No s'ha pogut obrir el fitxer");

    $art = $_POST["article"];
    $nom = $_POST["nom"];
    $preu = $_POST["preu"];
    $imatge = $_POST["imatge"];
    
    $f = file_get_contents($articles);
    $log = explode("\n",$f);

	foreach ($log as $i =>$key) {
		$revisar = $log[$i];
		$oldArt = explode(",",$revisar);
		if ($oldArt[0] == $art){
			$info = $art.",".$nom.",".$preu.",".$imatge;
            $log[$i] = $info;
            $validar = 1;
		}
    }
    $modificar = implode("\n",$log);
    
    if($validar = 1){
        $df = fopen($articles,"w") or die("No s'ha pogut obrir el fitxer d'articles");
        fwrite($df,$modificar."\n");
        fclose($df);
        echo ("Article modificat correctament");
    }

?>

