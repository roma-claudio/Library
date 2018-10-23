<?php
	require_once("header.php");
	$datafine= date("d-m-Y");
	$conn=connect_db();
	$query="SELECT * FROM Prestito WHERE numregistrazionecopia='".$_POST["numregistrazione"]."' AND emailutente='".$_POST["emailutente"]."' AND passwordutente='".$_POST["passwordutente"]."'AND datainizio='".$_POST["datainizio"]."'";
	//echo $query;
	$execute_query=pg_query($conn,$query);
	if ($execute_query){
	}	
	else{
		exit("Errore:".pg_last_error($conn));
	}
	while ($row = pg_fetch_assoc($execute_query)) {	
		$query="UPDATE Prestito SET attivo='f', datafine='".$datafine."' WHERE numregistrazionecopia='".$row["numregistrazionecopia"]."' AND emailutente='".$row["emailutente"]."' AND passwordutente='".$row["passwordutente"]."' AND datainizio='".$_POST["datainizio"]."'";
		//echo $query;
		$execute_query=pg_query($conn,$query);
		if ($execute_query){
			echo "<center><h3>Prestito Terminato!</h3></center>";
		}	
		else
			exit("Errore:".pg_last_error($conn));
	}

	require_once("footer.php");
?>