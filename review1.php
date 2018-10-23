<?php
require_once("header.php");
echo <<<PRINT
		<table class="table">
			<thead>
				<tr>
				<th>Titolo</th>
				<th>Autore</th>
			</tr>
		</thead>
PRINT;
	$conn= connect_db();
	$query1= "SELECT numregistrazionecopia FROM Prestito WHERE emailutente='".$_SESSION["Email"]."' AND passwordutente='".$_SESSION["Pwd"]."' AND Attivo='f' GROUP BY numregistrazionecopia";
	//echo $query1;
	$execute_query1= pg_query($conn,$query1);
	if(!$execute_query1){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}	
	while ($row1 = pg_fetch_assoc($execute_query1)) {
		$query2="SELECT * FROM Copia JOIN Libro ON (idlibro=libro.id) JOIN Scrive ON (scrive.idlibro=libro.id) JOIN Autore ON (scrive.idautore=autore.id) WHERE numregistrazione='".$row1["numregistrazionecopia"]."'";
		//echo $query2;
		$execute_query2= pg_query($conn,$query2);
		if(!$execute_query2){  
			echo "Errore: ".pg_last_error($conn);
			exit;
		}
		$row2= pg_fetch_assoc($execute_query2);
		$msg="<form id='form' class='form-vertical' action='review2.php' method='post'>
					<tbody>
					<tr><td>".$row2["titolo"]."<input type='hidden' name='titolo' value='".$row2["titolo"]."'></td>
					<td>".$row2["nome"]." ".$row2["cognome"]."<input type='hidden' name='nome' value='".$row2["nome"]." ".$row2["cognome"]."'></td>
					<td><input type='hidden' name='idlibro' value='".$row2["idlibro"]."'</td>
					<td><input type='submit' value='Recensisci libro' class='btn btn-primary'></td></tr>
					</form>";
		echo $msg;	
	}
	echo "</table>";
require_once("footer.php");
?>