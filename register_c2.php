<?php
	require_once("header_register.php");
	$conn=connect_db();
	$query="INSERT INTO Utente (Nome, Cognome, Tipo, Telefono, Email, Password) VALUES ('".$_POST["Nome"]."','".$_POST["Cognome"]."','".$_POST["Tipo"]."','".$_POST["Telefono"]."','".$_POST["Email"]."','".$_POST["Password"]."')";
	$execute_query=pg_query($conn,$query);
	if ($execute_query){
		echo "<center><h3>Registrazione completata con successo!</h3></center>";
		$_SESSION["Email"]=$_POST["Email"];
		$_SESSION["Pwd"]=$_POST["Password"];
		$_SESSION["Nome"]=$_POST["Nome"];
		$_SESSION["Cognome"]=$_POST["Cognome"];
	}	
	else
		exit("Errore:".pg_last_error($conn));
?>