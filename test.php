<?php
	require_once("header.php");


	$conn= connect_db();
	$query= "SELECT * FROM Autore ";
	//echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}
	$msg="<center><form role='form' id='form' action='"."add_script.php"."' method='"."POST"."'>
			<div class='form-group'>
				<select name='Autore' class='"."selectpicker"."' data-live-search='"."true"."' title='"."Autore"."'>";
	while ($row = pg_fetch_assoc($execute_query)) {
			$msg.="<option>".$row["nome"]." ".$row["cognome"]."</option>";
	}
	$msg.="</select></div>";
	echo $msg;		

	$query= "SELECT * FROM Libro";
	//echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}
	$msg="<div class='form-group'><select name='Titolo' class='"."selectpicker"."' data-live-search='"."true"."' title='"."Titolo"."'>";
	while ($row = pg_fetch_assoc($execute_query)) {
			$msg.="<option>".$row["titolo"]."</option>";
	}
	$msg.="</select></div>";		
	echo $msg;
	
	$query= "SELECT * FROM Libro";
	//echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}
	$msg="<div class='form-group'><select name='Anno' class='selectpicker' data-live-search='true' title='Anno'>";
	while ($row = pg_fetch_assoc($execute_query)) {
			$msg.="<option>".$row["anno"]."</option>";
	}
	$msg.="</select></div>";		
	echo $msg;


	$conn= connect_db();
	$query= "SELECT * FROM CasaEditrice ";
	//echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}
	$msg="<div class='form-group'>
				<select name='CasaEditrice' class='"."selectpicker"."' data-live-search='"."true"."' title='"."Casa Editrice"."'>";
	while ($row = pg_fetch_assoc($execute_query)) {
			$msg.="<option>".$row["nome"]." ".$row["città"]."</option>";
	}
	$msg.="</select></div>";
	echo $msg;		


	$msg="<div class='form-group'><input type='text' name='Sezione' placeholder='Sezione'></div>";		
	echo $msg;	
	
	$msg="<div class='form-group'><input type='text' name='Scaffale' placeholder='Scaffale'></div>";		
	echo $msg;

	$msg="	<button type='submit' class='btn'>Invia</button>
		</form></center>";
	echo $msg;
	require_once("footer.php");
?>
