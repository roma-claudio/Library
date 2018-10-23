<?php
 require_once("header.php");
 // Inserire un campo di ricerca full-text
echo <<<PRINT
<center>
<button onclick="redirect()">Cerca copia</button>
</center>
<script>
function redirect() {
    	location.href = "add.php";
}
</script>
	 <center>
		<table class='table'>
			<thead>
			<tr>
				<th>Titolo</th>
				<th>Autore</th>
				<th>Edizione</th>
				<th>Casa editrice</th>
			</tr>
		</thead>
	</center>
PRINT;
	$conn= connect_db();
	$query= "SELECT titolo,nome,cognome,edizione,nomecasaeditrice,cittàcasaeditrice,libro.id,numregistrazione  FROM Autore JOIN Scrive ON (Id=IdAutore) JOIN Libro ON (Scrive.IdLibro=Libro.Id) LEFT JOIN Copia ON (Libro.Id=Copia.IdLibro)";
	//echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}	
	while ($row = pg_fetch_assoc($execute_query)) {
			$msg= "<form id='form' action='add_script.php' method='post'>
					<center>
					<tbody>
					<tr><td>".$row["titolo"]."</td>
					<td>".$row["nome"]." ".$row["cognome"]."</td>
					<td>".$row["edizione"]."</td>
					<td>".$row["nomecasaeditrice"]."<input type='hidden' name='nomecasaeditrice' value='".$row["nomecasaeditrice"]."'</td>
					<td>".$row["cittàcasaeditrice"]."<input type='hidden' name='nomecasaeditrice' value='".$row["nomecasaeditrice"]."'</td>
					<td><input type='hidden' name='idlibro' value='".$row["id"]."'/></td>";
			if ($row["numregistrazione"]) {
				$msg.="<td><input type='submit' value='Aggiungi' class='btn btn-primary disabled'></a></td>";
			}
			else{
				$msg.="<td><input type='submit' value='Aggiungi' class='btn btn-primary active'></td>";
			}
			$msg.="</tr>	
					</tbody>
	 				</form>
					</center>";
	echo $msg;	
	}
	echo "</table>";
require_once("footer.php");
?>