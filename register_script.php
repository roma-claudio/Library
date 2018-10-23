<?php
	require_once("header.php");

	$conn=connect_db();
	$query="UPDATE Utente SET Sesso='".$_POST["Sesso"]."', Città='".$_POST["Città"]."', Provincia='".$_POST["Provincia"]."', Stato='".$_POST["Stato"]."',Data='".$_POST["Data"]."',Luogo= '".$_POST["Luogo"]."',Tipo='".$_SESSION["Tipo"]."' WHERE email='".$_SESSION["Email"]."'AND password='".$_SESSION["Pwd"]."'";
	//echo $query;
	$execute_query=pg_query($conn,$query);
	if ($execute_query)
		echo "<center><h3>Profilo aggiornato!</h3></center>";
	else
		exit("Errore:".pg_last_error($conn));
?>