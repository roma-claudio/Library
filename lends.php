<?php
	require_once("header.php");
	$DataInizio= date("d-m-Y");
echo <<<PRINT
	<center>
		<table cellpadding='10' cellspacing='1' border='1'>
			<tr>
				<th>Titolo</th>
				<th>Autore</th>
				<th>Edizione</th>
				<th>Casa editrice</th>
			</tr>
		</table>
	</center>
PRINT;
	$conn= connect_db();
	$query= "SELECT * FROM Prestito LEFT JOIN Copia ON(numregistrazionecopia=numregistrazione) LEFT JOIN Libro ON (idlibro=libro.id) LEFT JOIN Scrive ON (libro.id=scrive.idlibro) LEFT JOIN Autore ON (autore.id=scrive.idautore) WHERE Attivo IS NULL or Attivo='t'"; 
	//echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}	
	while ($row = pg_fetch_assoc($execute_query)) {
			$msg= "<form id='form' class='form-vertical' action='lends_script.php' method='post'>
					<center>
					<table cellpadding='10' cellspacing='1' border='1'>
					<tr><td>".$row["titolo"]."<input type='hidden' name='titolo' value='".$row["titolo"]."'></td>
					<td>".$row["nome"]." ".$row["cognome"]."<input type='hidden' name='nome' value='".$row["nome"]." ".$row["cognome"]."'></td>
					<td>".$row["edizione"]."<input type='hidden' name='edizione' value='".$row["edizione"]."'></td>
					<td>".$row["nomecasaeditrice"]."<input type='hidden' name='nomecasaeditrice' value='".$row["nomecasaeditrice"]."'</td>
					<input type='hidden' name='numregistrazione' value='".$row["numregistrazione"]."'</td>";
			if ($row['attivo']=='t'){	
				$msg.="<td><input type='submit' value='Revoca'></td>";
			}
			else
				$msg.="<td><input type='submit' value='Concedi'></td>";
			$msg.="</tr>	
					</table>
	 				</form>
					</center>";
	echo $msg;	
	}
require_once("footer.php");
?>

