<?php
	require_once("header.php");
	$conn=connect_db();
	$query="SELECT * FROM Prestito WHERE numregistrazionecopia='".$_POST["numregistrazione"]."'";
	echo $query;
	$execute_query=pg_query($conn,$query);
	if ($execute_query){
	}	
	else
		exit("Errore:".pg_last_error($conn));
	$row = pg_fetch_assoc($execute_query);
	$Attivo = "'".$row["attivo"]."'";
	//echo $Attivo;
	if ($Attivo == 't') {	
		$query="UPDATE Prestito SET attivo='f' WHERE numregistrazionecopia='".$_POST["numregistrazione"]."'";
		//echo $query;
		$execute_query=pg_query($conn,$query);
		if ($execute_query){
			echo "<center><h3>Prestito revocato!</h3></center>";
		}	
		else
			exit("Errore:".pg_last_error($conn));
	}else{
		$query="UPDATE Prestito SET attivo='t' WHERE numregistrazionecopia='".$_POST["numregistrazione"]."'";
		//echo $query;
		$execute_query=pg_query($conn,$query);
		if ($execute_query){
			echo "<center><h3>Prestito concesso!</h3></center>";
		}	
		else
			exit("Errore:".pg_last_error($conn));
	}	

	require_once("footer.php");
?>