<?php
	require_once("header.php");
	$lock='0';
	$conn= connect_db();
	$query= "SELECT * FROM Utente WHERE email='".$_SESSION["Email"]."' AND password='".$_SESSION["Pwd"]."'";
	//echo $query;
	$execute_query= pg_query($conn,$query);
	if(!$execute_query){  
		echo "Errore: ".pg_last_error($conn);
		exit;
	}	
	$row=pg_fetch_assoc($execute_query);
	if ($row) {
		$_SESSION["Città"]=$row["città"];
		$_SESSION["Provincia"]=$row["provincia"];
		$_SESSION["Stato"]=$row["stato"];
		$_SESSION["Data"]=$row["data"];
		$_SESSION["Luogo"]=$row["luogo"];
		$_SESSION["Sesso"]=$row["sesso"];
		$_SESSION["Tipo"]=$row["tipo"];
	}	
echo "
<form action='register_script.php' method='POST'>
<div class='form-group'>
		<label for='nome'>Nome</label>
		<input type='text' value='".$_SESSION["Nome"]."' class='form-control' id='nome' disabled>
</div>
<div class='form-group'>
		<label for='cognome'>Cognome</label>
		<input type='text' value='".$_SESSION["Cognome"]."' class='form-control' id='cognome' disabled>
</div>
<div class='form-group'>
		<label for='email'>Email</label>
		<input type='text' value='".$_SESSION["Email"]."' class='form-control' id='email' disabled>
</div>
<div class='form-group'>
				<label for='Sesso'>Sesso</label>
				<select class='form-control' id='Sesso' required>";
				if ($_SESSION["Sesso"]=='M') {
					echo "<option selected='selected' value='M'>M</option><option value='F'>F</option>";
					$lock='1';
				}
				if ($_SESSION["Sesso"]=='F'){
					echo "<option  value='M'>M</option><option selected='selected' value='F'>F</option>";
					$lock='1';
				}
				if ($lock=='0'){
					echo "<option  value='M'>M</option><option value='F'>F</option>";
				}
echo"
</select>
</div>
<div class='form-group'>
		<label for='Città'>Città</label>
		<input type='text' id='Città' maxlength='20' value='".$_SESSION["Città"]."' class='form-control' required>
</div>
<div class='form-group'>
		<label for='Provincia'>Provincia</label>
		<input type='text' id='Provincia' maxlength='20' value='".$_SESSION["Provincia"]."' class='form-control' required>
</div>
<div class='form-group'>
		<label for='Stato'>Stato</label><input type='text' id='Stato' maxlength='20' value='".$_SESSION["Stato"]."' class='form-control' required>
</div>
<div class='form-group'>
		<label for='Data'>Data</label>
		<input type='date' id='Data' value='".$_SESSION["Data"]."' class='form-control' required>
</div>
<div class='form-group'>
		<label for='luogo'>Luogo  di nascita</label><input type='text' id='Luogo' maxlength='30' value='".$_SESSION["Luogo"]."' class='form-control' required></td>
</div>
<div>
			<input type='submit' value='Salva' class='btn btn-primary'>
</div>
</form>";
require_once("footer.php");
?>