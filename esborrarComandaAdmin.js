function esbComandaA() {
	// Variables locals
	var urlCodi = "http://localhost:9090/esborrarComandaAdmin.php?q=";
	var metode = "DELETE";
	
	let usuari = document.getElementById("usuari").value;
	let numCom = document.getElementById("numC").value;

	let comanda = usuari + "/" + numCom;

	// Enviament dades a PHP
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) { 
			if ((xhttp.status == 200) || (xhttp.status == 403) || (xhttp.status == 404) || (xhttp.status == 405)){ 
				//document.getElementById("resp").innerHTML = xhttp.responseText;
			}
		}
	}
	xhttp.open(metode,urlCodi + comanda,true);
	xhttp.send();				
}