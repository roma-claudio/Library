<?php
	require_once("header.php");

	$conn=connect_db();
	$query="DELETE FROM Copia WHERE numregistrazione='".$_POST["numregistrazione"]."'";
	//echo $query;
	$execute_query=pg_query($conn,$query);
	if ($execute_query){
		echo "<center><h3>Copia rimossa con successo!</h3></center>";
	}	
	else
		exit("Errore:".pg_last_error($conn));
?>