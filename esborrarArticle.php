<?php

    session_start();

    $articles = "/var/www/html/fitxers/articles.txt";
    $articlesTemp = "/var/www/html/fitxers/articlesTemp.txt";
    $llegir_fitxer = fopen($articles,"r") or die ("No s'ha pogut obrir el fitxer");
    $llegir_temp = fopen($articlesTemp,"w") or die ("No s'ha pogut obrir el fitxer temporal");


    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

       $num_article = $_REQUEST["q"];

        $f = file_get_contents($articles);
        $log = explode("\n",$f);

	    foreach ($log as $i =>$key) {
		    $revisar = $log[$i];
            $oldArt = explode(",",$revisar);
            $info = $oldArt[0].",".$oldArt[1].",".$oldArt[2].",".$oldArt[3].",".$oldArt[4]."\n";

		    if ($oldArt[0] != $num_article){
		    	fwrite($llegir_temp,$info);
		    }
        }
    }

    unlink($articles);
    rename($articlesTemp,$articles);
    fclose($articles);
    fclose($articlesTemp);

?>
