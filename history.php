<?php
	require_once("header.php");
echo <<<PRINT
	<center>
		<table class='table'>
			<thead>
				<tr>
				<th>Titolo</th>
				<th>Autore</th>
				<th>Edizione</th>
				<th>Casa editrice</th>
				<th>Email Utente</th>
				<th>Data inizio</th>
				<th>Data fine</th>
				<th>Voto<th>
			</tr>
		</thead>
	</center>
PRINT;
	$conn= connect_db();
	$query= "SELECT prestito.emailutente AS emailu,* FROM Prestito LEFT JOIN Copia ON(numregistrazionecopia=numregistrazione) LEFT JOIN Libro ON (idlibro=libro.id) LEFT JOIN Scrive ON (libro.id=scrive.idlibro) LEFT JOIN Autore ON (autore.id=scrive.idautore) LEFT JOIN Opinione ON(libro.id=opinione.idlibro AND Prestito.emailutente=opinione.emailutente AND prestito.passwordutente=opinione.passwordutente) WHERE Attivo='f' AND datafine IS NOT NULL"; 
	echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}	
	while ($row = pg_fetch_assoc($execute_query)) {
			$msg= "<center>
					<tbody>
					<tr><td>".$row["titolo"]."</td>
					<td>".$row["nome"]." ".$row["cognome"]."</td>
					<td>".$row["edizione"]."</td>
					<td>".$row["nomecasaeditrice"]."</td>
					<td>".$row["emailu"]."</td>
					<td>".$row["datainizio"]."</td>
					<td>".$row["datafine"]."</td>
					<td>".$row["giudizio"]."</td>
					</tr>	
					</tbody>
					</center>";
	echo $msg;	
	}
	echo "</table>";
require_once("footer.php");
?>

