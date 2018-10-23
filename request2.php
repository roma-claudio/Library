<?php
	require_once("header.php");
	$DataInizio= date("d-m-Y");
	$conn=connect_db();
	$query="INSERT INTO Prestito(EmailUtente, PasswordUtente, NumRegistrazioneCopia ,DataInizio) VALUES ('".$_SESSION["Email"]."','".$_SESSION["Pwd"]."','".$_POST["numregistrazione"]."','".$DataInizio."')";
	//echo $query;
	$execute_query=pg_query($conn,$query);
	if ($execute_query){
		echo "<center><h3>Richiesta di prestito effettuata!</h3></center>";
	}	
	else
		exit("Errore:".pg_last_error($conn));
	require_once("footer.php");
?>