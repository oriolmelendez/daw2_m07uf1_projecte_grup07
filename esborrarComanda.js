
function esbComanda() {
	// Variables locals
	var urlCodi = "http://localhost:9090/esborrarComanda.php?q=";
	var metode = "DELETE";
	
	let numCom = document.getElementById("numC").value;

	// Enviament dades a PHP
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) { 
			if ((xhttp.status == 200) || (xhttp.status == 403) || (xhttp.status == 404) || (xhttp.status == 405)){ 
				//document.getElementById("resp").innerHTML = xhttp.responseText;
			}
		}
	}
	xhttp.open(metode,urlCodi + numCom,true);
	xhttp.send();				
}