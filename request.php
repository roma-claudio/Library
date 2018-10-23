<?php
	require_once("header.php");
	/*<form action="request2.php" method="POST">
		<center><input type="Text" name="text" value="cerca..."></center>
	</form>*/
	$locklends='0';
	$conn= connect_db();
	$query= "CREATE OR REPLACE VIEW a AS
			SELECT *
			FROM Prestito
			WHERE emailutente='".$_SESSION["Email"]."' AND passwordutente='".$_SESSION["Pwd"]."' AND attivo='t'
			UNION
			SELECT * 
			FROM Prestito
			WHERE emailutente='".$_SESSION["Email"]."' AND passwordutente='".$_SESSION["Pwd"]."' AND attivo IS NULL;

			SELECT emailutente,count(emailutente) as C
			FROM a
			GROUP BY emailutente,passwordutente;";
	//echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}
	while ($row = pg_fetch_assoc($execute_query)) {
		if ($_SESSION["Tipo"]=='Docente' AND $row['c']>'10') {
				$locklends='1';
		}
		if ($_SESSION["Tipo"]=='Studente' AND $row['c']>'5') {
				$locklends='1';
		}
		if ($_SESSION["Tipo"]=='Altro' AND $row['c']>'3') {
				$locklends='1';
		}
	}
	$query1="SELECT * FROM Autore JOIN Scrive ON (Id=IdAutore)JOIN Libro ON (Scrive.IdLibro=Libro.Id) JOIN Copia ON (Scrive.IdLibro=Copia.IdLibro)";
	//echo $query1;
	$execute_query1= pg_query($conn,$query1);
	if(!$execute_query1){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}
echo <<<PRINT
	<center>
		<table class="table">
    		<thead>
      			<tr>
        			<th>Titolo</th>
        			<th>Autore</th>
       				<th>Edizione</th>
       				<th>Casa Editrice</th>
       				<th><th>
      			</tr>
    		</thead>
PRINT;
	while ($row1 = pg_fetch_assoc($execute_query1)) {
			$msg="	<form action="."request2.php"." method="."POST".">
					<tbody>
					<tr><td>".$row1["titolo"]."</td>
					<td>".$row1["nome"]." ".$row1["cognome"]."</td>
					<td>".$row1["edizione"]."</td>
					<td>".$row1["nomecasaeditrice"]."</td>
					<input type='hidden' name='numregistrazione' value='".$row1["numregistrazione"]."'>";
			$query2="SELECT * FROM Prestito WHERE numregistrazionecopia='".$row1["numregistrazione"]."' AND Attivo='t' OR numregistrazionecopia='".$row1["numregistrazione"]."' AND Attivo IS NULL";
			//echo $query2;
			$execute_query2= pg_query($conn,$query2);
			$row2 = pg_fetch_assoc($execute_query2);	
			if ( $row2 AND $locklends=='0') {
				$msg.="<td><input type="."submit"." value="."Richiedi"." class='btn btn-primary disabled'></td>";
			}
			else {
				$msg.="	<td><input type="."submit"." value="."Richiedi"." class='btn btn-primary active'></td>";
			}	
	 		$msg.="</form>
	 				<form action='review_story.php' method='post'>
	 				<input type='hidden' name='idlibro' value='".$row1["idlibro"]."'>
	 				<td><input type="."submit"." value="."Valutazioni"." class='btn btn-info'></td>
	 				</form>
	 				</tr>
	 					";
			echo $msg;
	}
	echo "</tbody>
	 		</table>
	 		</center>";
	require_once("footer.php");
?>