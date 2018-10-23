<?php
	require_once("header.php");
?>

<?php
	$conn=connect_db();
	$query="DELETE FROM Copia (Nome, Cognome, Tipo, Telefono, Email, Password) WHERE ('".$_POST["Nome"]."','".$_POST["Cognome"]."','".$_POST["Tipo"]."','".$_POST["Telefono"]."','".$_POST["Email"]."','".$_POST["Password"]."')";
	$execute_query=pg_query($conn,$query);
	if ($execute_query){
		echo "<center><h3>Copia rimossa con successo!</h3></center>";
	}	
	else
		exit("Errore:".pg_last_error($conn));
?>