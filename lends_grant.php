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
			</tr>
		</thead>
	</center>
PRINT;
	$conn= connect_db();
	$query= "SELECT * FROM Prestito LEFT JOIN Copia ON(numregistrazionecopia=numregistrazione) LEFT JOIN Libro ON (idlibro=libro.id) LEFT JOIN Scrive ON (libro.id=scrive.idlibro) LEFT JOIN Autore ON (autore.id=scrive.idautore) WHERE Attivo IS NULL"; 
	//echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}	
	while ($row = pg_fetch_assoc($execute_query)) {
			$msg= "<form id='form' class='form-vertical' action='lends_grant_script.php' method='post'>
					<center>
					<tbody>
					<tr><td>".$row["titolo"]."<input type='hidden' name='titolo' value='".$row["titolo"]."'></td>
					<td>".$row["nome"]." ".$row["cognome"]."<input type='hidden' name='nome' value='".$row["nome"]." ".$row["cognome"]."'></td>
					<td>".$row["edizione"]."<input type='hidden' name='edizione' value='".$row["edizione"]."'></td>
					<td>".$row["nomecasaeditrice"]."<input type='hidden' name='nomecasaeditrice' value='".$row["nomecasaeditrice"]."'</td>
					<td>".$row["emailutente"]."<input type='hidden' name='emailutente' value='".$row["emailutente"]."'></td>
					<input type='hidden' name='numregistrazione' value='".$row["numregistrazione"]."'></td>
					<input type='hidden' name='passwordutente' value='".$row["passwordutente"]."'></td>
					<input type='hidden' name='datainizio' value='".$row["datainizio"]."'></td>
					<td><input type='submit' value='Concedi' class='btn btn-success'></td>
					</form>
					<form action='lends_rev_script.php' method='post'>
					<input type='hidden' name='emailutente' value='".$row["emailutente"]."'>
					<input type='hidden' name='datainizio' value='".$row["datainizio"]."'>
					<input type='hidden' name='passwordutente' value='".$row["passwordutente"]."'>
					<input type='hidden' name='numregistrazione' value='".$row["numregistrazione"]."'>
					<td><input type='submit' value='Rifiuta' class='btn btn-danger'></td>
					</form>
					</tr>	
					</tbody>
					</center>";
	echo $msg;	
	}
	echo "</table>";
require_once("footer.php");
?>

