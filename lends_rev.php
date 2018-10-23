<?php
	require_once("header.php");
	$Data= strtotime('now');
	//echo $Data;
	$lock='0';
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
				<th>Data Inizio</th>
			</tr>
		</thead>
	</center>
PRINT;
	$conn= connect_db();
	$query= "SELECT * FROM Prestito JOIN Utente ON(emailutente=utente.email AND passwordutente=utente.password) LEFT JOIN Copia ON(numregistrazionecopia=numregistrazione) LEFT JOIN Libro ON (idlibro=libro.id) LEFT JOIN Scrive ON (libro.id=scrive.idlibro) LEFT JOIN Autore ON (autore.id=scrive.idautore) WHERE Attivo='t'";
	//$query= "SELECT * FROM Prestito LEFT JOIN Copia ON(numregistrazionecopia=numregistrazione) LEFT JOIN Libro ON (idlibro=libro.id) LEFT JOIN Scrive ON (libro.id=scrive.idlibro) LEFT JOIN Autore ON (autore.id=scrive.idautore) WHERE Attivo='t'"; 
	//echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}	
	while ($row = pg_fetch_assoc($execute_query)) {
			$lock='0';
			$Datainizio=strtotime($row['datainizio']);
			if ($row['tipo']=='Studente' AND ($Data - $Datainizio)>'5259487.7'){
					$lock='1';
			}
			if ($row['tipo']=='Docente' AND ($Data - $Datainizio)>'7889231.5'){
					$lock='1';
			}
			if ($row['tipo']=='Altro' AND ($Data - $Datainizio)>'1209600'){
					$lock='1';
			}
			$msg= "<form id='form' class='form-vertical' action='lends_rev_script.php' method='post'>
					<center>
					<tbody>
					<tr><td>".$row["titolo"]."<input type='hidden' name='titolo' value='".$row["titolo"]."'></td>
					<td>".$row["nome"]." ".$row["cognome"]."<input type='hidden' name='nome' value='".$row["nome"]." ".$row["cognome"]."'></td>
					<td>".$row["edizione"]."<input type='hidden' name='edizione' value='".$row["edizione"]."'></td>
					<td>".$row["nomecasaeditrice"]."<input type='hidden' name='nomecasaeditrice' value='".$row["nomecasaeditrice"]."'</td>
					<td>".$row["emailutente"]."<input type='hidden' name='emailutente' value='".$row["emailutente"]."'></td>
					<td>".$row["datainizio"]."<input type='hidden' name='datainizio' value='".$row["datainizio"]."'</td>
					<input type='hidden' name='numregistrazione' value='".$row["numregistrazione"]."'</td>
					<input type='hidden' name='passwordutente' value='".$row["passwordutente"]."'</td>
					<td><input type='submit' value='Termina'></td>";
			if ($lock=='1'){
				$msg.="<td>Scaduto!</td>";
			}
			$msg.="</tr>	
					</tbody>
	 				</form>
					</center>";
	echo $msg;
	if ($lock2=='1'){
			submit();
	}	
	}
	echo "</table>";
require_once("footer.php");
?>

