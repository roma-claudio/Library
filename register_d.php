<?php
 	require_once("header_register.php");
echo <<<PRINT
	<center><h2>Registrati al sistema</h2></center>
	<div class='row row-centered'>
	<div class='col-md-4 col-md-offset-4'>
	<form action="register_d2.php" method="POST">
	<div class='form-group'>
			<label for='Nome'>Nome</label>
			<input type="text" id="Nome" name='Nome' class="form-control" maxlength='30' required>
	</div>
	<div class='form-group'>
			<label for='Cognome'>Cognome</label>
			<input type="text" id="Cognome" name='Cognome' class='form-control' maxlength='30' required>
	</div>
	<div class='form-group'>
			<label for='Username'>Username</label>
			<input type="text" id="Username" name='Username' class='form-control' maxlength='30' required>
	</div>
	<div class='form-group'>
			<label for='Password'>Password</label>
			<input type="password" id="Password" name="Password" class='form-control' maxlength='30' required>
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