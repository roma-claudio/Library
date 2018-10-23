<?php
	require_once("header.php");
	$conn=connect_db();
	if ($_POST["Giudizio"]==''){
		$query="INSERT INTO Opinione 
				VALUES ('".$_SESSION["Email"]."','".$_SESSION["Pwd"]."','".$_SESSION["idlibro"]."',NULL,'".$_POST["Commento"]."')
				ON CONFLICT (emailutente, passwordutente, idlibro) DO
				UPDATE SET emailutente='".$_SESSION["Email"]."',passwordutente='".$_SESSION["Pwd"]."',idlibro='".$_SESSION["idlibro"]."',giudizio=NULL,commento='".$_POST["Commento"]."';";
		//echo $query;
	}else{
		$query="INSERT INTO Opinione 
				VALUES ('".$_SESSION["Email"]."','".$_SESSION["Pwd"]."','".$_SESSION["idlibro"]."','".$_POST["Giudizio"]."','".$_POST["Commento"]."')
				ON CONFLICT (emailutente, passwordutente, idlibro) DO
				UPDATE SET emailutente='".$_SESSION["Email"]."',passwordutente='".$_SESSION["Pwd"]."',idlibro='".$_SESSION["idlibro"]."',giudizio='".$_POST["Giudizio"]."',commento='".$_POST["Commento"]."';";
		//echo $query;
	}
	$execute_query=pg_query($conn,$query);
	if ($execute_query)
		echo "<center><h3>Opinione pubblicata!</h3></center>";
	else
		exit("Errore:".pg_last_error($conn));
?>