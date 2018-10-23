<?php
	require_once("header.php");

	$conn= connect_db();
	$query= "INSERT INTO Prestito(datainizio,emailutente,passwordutente,numregistrazionecopia,scaduto) VALUES ('".$_POST["datainizio"]."','".$_POST["emailutente"]."','".$_POST["passwordutente"]."','".$_POST["numregistrazionecopia"]."','TRUE')";
	echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}	

	require_once("footer.php");
?>