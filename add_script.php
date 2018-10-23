<?php
	require_once("header.php");
	$_SESSION["idlibro"]=$_POST['idlibro'];
echo <<<PRINT
		<center>
			<form action='add_script2.php' method='post'>
				Casa Editrice<br>
				<div class='form-group'><input type='text' name='Nome' placeholder='Nome'></div>
				<div class='form-group'><input type='text' name='Città' placeholder='Città'></div>
				Edizione<br>
				<div class='form-group'><input type='text' name='Edizione' value='Prima'></div>
				Posizione<br>
				<div class='form-group'><input type='text' name='Sezione' placeholder='Sezione'></div>
				<div class='form-group'><input type='text' name='Scaffale' placeholder='Scaffale'></div>
				Codice ISBN<br>
				<div class='form-group'><input type='text' name='ISBN'></div>
				<input type='submit' value='Aggiungi'>
			</form>
		</center>
PRINT;
	require_once("footer.php");
?>
