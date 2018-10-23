<?php
 require_once("header.php");
 // Inserire un campo di ricerca full-text
 $gruppo='id';
echo <<<PRINT
<script>
function search() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("Input");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
         td = tr[i].getElementsByTagName("td")[1];
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
       		 tr[i].style.display = "";
       	} else {
       		td = tr[i].getElementsByTagName("td")[2];
         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
       		 tr[i].style.display = "";
       		} else {
       			td = tr[i].getElementsByTagName("td")[3];
         		if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
       		 		tr[i].style.display = "";
       			} else {
       				tr[i].style.display = "none";
       			}
       		}
       	}
       }
     }
  }
}
</script>
</script>
	<input type="text" id="Input" onkeyup="search()" placeholder="Cerca..">
		<form action="" method='post'>
		<div class='form-group'>
						<label for='gruppo'>Ordina per</label>
						<select class='form-control' id='gruppo' name='gruppo' onchange='this.form.submit()' required>
							<option></option>
							<option value='Titolo'>Titolo</option>
							<option value='Autore'>Autore</option>
							<option value='Edizione'>Edizione</option>
							<option value='nomecasaeditrice'>Casa Editrice</option>
				</select>
		</form>
		</div>
		<table class='table' id='table'>
			<thead>
				<tr>
				<th>Titolo</th>
				<th>Autore</th>
				<th>Edizione</th>
				<th>Casa editrice</th>
				</tr>
		</thead>
PRINT;
	if(isset($_POST['gruppo'])){ 
  		$gruppo = $_POST['gruppo']; 
	} 
	//echo $gruppo;   
	$conn= connect_db();
	$query= "SELECT titolo,nome,cognome,edizione,nomecasaeditrice,cittàcasaeditrice,libro.id,numregistrazione  FROM Autore JOIN Scrive ON (Id=IdAutore) JOIN Libro ON (Scrive.IdLibro=Libro.Id) LEFT JOIN Copia ON (Libro.Id=Copia.IdLibro) ORDER BY ".$gruppo."";
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
					<tr><td>".$row["titolo"]."</td>
					<td>".$row["nome"]." ".$row["cognome"]."</td>
					<td>".$row["edizione"]."</td>
					<td>".$row["nomecasaeditrice"]." ".$row["cittàcasaeditrice"]." </td>
					<td><input type='hidden' name='idlibro' value='".$row["id"]."'/></td>
					</tr>	
					</tbody>
	 				</form>
					</center>";
	echo $msg;	
	}
	echo "</table>";
require_once("footer.php");
?>