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
	$query= "SELECT * FROM Autore JOIN Scrive ON (Id=IdAutore) JOIN Libro ON (Scrive.IdLibro=Libro.Id) JOIN Copia ON (Libro.Id=Copia.IdLibro)"; 
	//echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}	
	while ($row = pg_fetch_assoc($execute_query)) {
			$msg= "<form id='form' class='form-vertical' action='remove_script.php' method='post'>
					<center>
					<tbody>
					<tr><td>".$row["titolo"]."<input type='hidden' name='titolo' value='".$row["titolo"]."'></td>
					<td>".$row["nome"]." ".$row["cognome"]."<input type='hidden' name='nome' value='".$row["nome"]." ".$row["cognome"]."'></td>
					<td>".$row["edizione"]."<input type='hidden' name='edizione' value='".$row["edizione"]."'></td>
					<td>".$row["nomecasaeditrice"]."<input type='hidden' name='nomecasaeditrice' value='".$row["nomecasaeditrice"]."'</td>
					<input type='hidden' name='numregistrazione' value='".$row["numregistrazione"]."'</td>		
					<td><input type='submit' value='Rimuovi'></td>
					</tr>	
					</tbody>
	 				</form>
					</center>";
	echo $msg;	
	}
	echo "</tbody";
require_once("footer.php");
?>