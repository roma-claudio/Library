<?php
	require_once("header.php");
	$conn=connect_db();
	$query="INSERT INTO Copia(idlibro, nomecasaeditrice, cittàcasaeditrice, edizione, sezione, scaffale, codiceISBN) VALUES ('".$_SESSION['idlibro']."','".$_POST["Nome"]."','".$_POST["Città"]."','".$_POST["Edizione"]."','".$_POST["Sezione"]."','".$_POST["Scaffale"]."','".$_POST["ISBN"]."')";
	//echo $query;
	$execute_query=pg_query($conn,$query);
	if ($execute_query){
		echo "<center><h3>Copia agggiunta con successo!</h3></center>";
	}	
	else
		exit("Errore:".pg_last_error($conn));
	require_once("footer.php");
?>