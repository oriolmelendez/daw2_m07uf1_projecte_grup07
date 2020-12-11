<?php
	ob_start();
	session_start();
	$nom = $_SESSION["user_name"];

	if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

		$comanda = $_REQUEST["q"];

		unlink("/var/www/html/fitxers/comandes/".$nom."/".$comanda);
		
	}

	header("Refresh:0");
	ob_end_flush();
	exit;
?>
