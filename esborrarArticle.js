
function esbArticle() {
	// Variables locals
	var urlCodi = "http://localhost:9090/esborrarArticle.php?q=";
	var metode = "DELETE";
	
	let nomArticle = document.getElementById("num_art").value;

	// Enviament dades a PHP
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4) { 
			if ((xhttp.status == 200) || (xhttp.status == 403) || (xhttp.status == 404) || (xhttp.status == 405)){ 
				//document.getElementById("resp").innerHTML = xhttp.responseText;
			}
		}
	}
	xhttp.open(metode,urlCodi + nomArticle,true);
	xhttp.send();				
}