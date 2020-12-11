function esbUsuari() {
	// Variables locals
	var urlCodi = "http://localhost:9090/esborrarUsuari.php?q=";
	var metode = "DELETE";
	
    let nomUser = document.getElementById("user_n").value;

	// Enviament dades a PHP
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) { 
			if ((xhttp.status == 200) || (xhttp.status == 403) || (xhttp.status == 404) || (xhttp.status == 405)){ 
				//document.getElementById("resp").innerHTML = xhttp.responseText;
			}
		}
	}
	xhttp.open(metode,urlCodi + nomUser,true);
	xhttp.send();				
}