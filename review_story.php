<?php
 require_once("header.php");
 $gruppo='id';
echo <<<PRINT
<form id='form' action='list.php' method='post'>
		<div class='form-group'>
						<label for='gruppo'>Ordina per</label>
						<select class='form-control' id='gruppo' name='gruppo'  required>
							<option value='Giudizio ASC'>Giudizio ASC</option>
							<option value='Giudizio DESC'>Giudizio DESC</option>
				</select>
		</form>
		</div>
		<table class='table'>
			<thead>
				<tr>
				<th>Utente</th>
				<th>Giudizio</th>
				<th>Commento</th>
				</tr>
		</thead>
PRINT;
	if(isset($_POST['gruppo'])){ //check if form was submitted
  		$gruppo = $_POST['gruppo']; //get input text
	}    
	$conn= connect_db();
	$query= "SELECT *  FROM Opinione JOIN Libro ON (IdLibro=Id) WHERE idlibro='".$_POST['idlibro']."' ORDER BY ".$gruppo."";
	//echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}	
	while ($row = pg_fetch_assoc($execute_query)) {
			$msg= "
					<center>
					<tbody>
					<tr><td>".$row["emailutente"]."</td>
					<td>".$row["giudizio"]."</td>
					<td>".$row["commento"]."</td>
					</tr>	
					</tbody>
	 				</form>
					</center>";
	echo $msg;	
	}
	echo "</table>";
require_once("footer.php");
?>