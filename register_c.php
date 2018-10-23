<?php
 	require_once("header_register.php");
echo <<<PRINT
<center>
	<h2>Registrati al sistema</h2></center>
	<div class='row'>
	<div class='col-md-4 col-md-offset-4'>
	<form action="register_c2.php" method="POST">
	<div class='form-group'>
			<label for='Nome'>Nome</label>
			<input type="text" id="Nome" name="Nome" class="form-control" maxlength='30' required>
	</div>
	<div class='form-group'>
			<label for='Cognome'>Cognome</label>
			<input type="text" id="Cognome" name="Cognome" class='form-control' maxlength='30' required>
	</div>
	<div class='form-group'>
			<label for='Telefono'>Telefono</label>
			<input type="number" id="Telefono" name="Telefono" class='form-control' max='99999999999' required>
	</div>
	<div class='form-group'>
			<label for="Email">Email</label>
			<input type="text" id"Email" name="Email" class='form-control' maxlength='30' required>
	</div>
	<div class='form-group'>
			<label for='Password'>Password</label>
			<input type="password" id="Password" name="Password" class='form-control' maxlength='30' required>
	</div>
	<div class="form-group">
			<label for='Tipo'>Categoria</label>
			<select name="Tipo" class='form-control'>
				<option value="Studente">Studente</option>
				<option value="Docente">Docente</option>
				<option value="Altro">Altro</option>
			</select>
	</div>
	<div>
		<input type="submit" value="Invia" class='btn btn-primary'>
	</div>
	</form>
	</div>
	</div>
PRINT;
	require_once("footer.php");
?>