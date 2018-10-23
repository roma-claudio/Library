<?php
	require_once("header.php");
	$conn=connect_db();
	$query1="INSERT INTO AUTORE(Nome,Cognome,Data,Luogo,Biografia) VALUES ('".$_POST["nomeautore"]."','".$_POST["cognomeautore"]."','".$_POST["dataautore"]."','".$_POST["luogo"]."','".$_POST["biografia"]."') ON CONFLICT (Nome,Cognome,Data)DO UPDATE SET Nome='".$_POST["nomeautore"]."', cognome='".$_POST["cognomeautore"]."', data='".$_POST["dataautore"]."', luogo='".$_POST["luogo"]."', biografia='".$_POST["biografia"]."';";
	//echo $query1;
	$execute_query1=pg_query($conn,$query1);
	if (!$execute_query1){
		exit("Errore:".pg_last_error($conn));
	}
	$query2="SELECT id FROM Autore WHERE Nome='".$_POST["nomeautore"]."' AND cognome='".$_POST["cognomeautore"]."' AND data='".$_POST["dataautore"]."';";
	//echo $query2;
	$execute_query2=pg_query($conn,$query2);
	if (!$execute_query2){
		exit("Errore:".pg_last_error($conn));
	}
	while($row = pg_fetch_assoc($execute_query2)){
		$idautore=$row["id"];
	}
	$query3="INSERT INTO Libro(Titolo) VALUES ('".$_POST["titolo"]."','".$_POST["annolibro"]."') ON CONFLICT (Titolo,Lingua,Anno) DO UPDATE SET Titolo='".$_POST["titolo"]."',Anno='".$_POST["annolibro"]."';";
	$execute_query3=pg_query($conn,$query3);
	if (!$execute_query3){
		exit("Errore:".pg_last_error($conn));
	}
	$query4="SELECT id FROM Libro WHERE Titolo='".$_POST["titolo"]."'AND Lingua='".$_POST["lingua"]."' AND Anno='".$_POST["annolibro"]."';";
	$execute_query4=pg_query($conn,$query4);
	if (!$execute_query4){
		exit("Errore:".pg_last_error($conn));
	}
	while($row = pg_fetch_assoc($execute_query4)){
		$idlibro=$row["id"];
	}
	$query5="INSERT INTO Scrive(idlibro,idautore) VALUES ('".$idlibro."','".$idautore."') ON CONFLICT (idlibro,idautore) DO UPDATE SET idlibro='".$idlibro."', idautore='".$idautore."';";
	$execute_query5=pg_query($conn,$query5);
	if (!$execute_query5){
		exit("Errore:".pg_last_error($conn));
	}

	$query6="INSERT INTO CasaEditrice(Nome,Città) VALUES ('".$_POST["nomecasaeditrice"]."','".$_POST["cittàcasaeditrice"]."') ON CONFLICT (Nome,Città) DO UPDATE SET Nome='".$_POST["nomecasaeditrice"]."', Città='".$_POST["cittàcasaeditrice"]."';";
	//echo $query6;
	$execute_query6=pg_query($conn,$query6);
	if (!$execute_query6){
		exit("Errore:".pg_last_error($conn));
	}

	$query7="INSERT INTO Copia(Sezione,Scaffale,CodiceISBN,Edizione,IdLibro,NomeCasaEditrice,CittàCasaEditrice,Lingua) VALUES ('".$_POST["sezione"]."','".$_POST["scaffale"]."','".$_POST["ISBN"]."','".$_POST["edizione"]."','".$idlibro."','".$_POST["nomecasaeditrice"]."','".$_POST["cittàcasaeditrice"]."','".$_POST["lingua"]."');";
	$execute_query7=pg_query($conn,$query7);
	if (!$execute_query7){
		exit("Errore:".pg_last_error($conn));
	}
	else{
		echo "<center>Libro Aggiunto!</center>";
	}
	require_once("footer.php");
?>