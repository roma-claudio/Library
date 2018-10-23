<?php
	require_once("header.php");
echo <<<PRINT
		<div class='row'>
		<div class='col-md-4 col-md-offset-4'>
		<form action='add2_script.php' method='post'>
		<div class='from-group'>
			<label for='nomeautore'>Autore</label>
			<input type='text' name='nomeautore' id='nomeautore' placeholder='Nome' maxlength='30' class='form-control' required>
			<input type='text' name='cognomeautore' id='nomeautore' placeholder='Cognome' maxlength='30' class='form-control' required>
			<input type='text' name='luogo' id='nomeautore' placeholder='Luogo di nascita' maxlength='30' class='form-control' required>
			<textarea name='biografia' id='nomeautore' rows='3' cols='22' placeholder='Biografia' class='form-control' required></textarea>
		</div>
		<div class='from-group'>
		<label for='dataautore'>Data di nascita</label>
			<input type='date' id='dataautore' name='dataautore' class='form-control' required>
		</div>
		<button onclick="addrow()">+</button>
		<div class='from-group'>
			<label for='libro'>Libro</label>
			<input type='text' name='titolo' id='titolo' class='form-control' placeholder='Titolo' maxlength='50' required>
			<input type='text' name='lingua' id='titolo' class='form-control' placeholder='Lingua' maxlength='30' required>
		</div>
		<div class='from-group'>
			<label for='annolibro'>Anno di pubblicazione</label>	
			<input type='numeric' name='annolibro' id='annolibro' class='form-control' placeholder='Anno di pubblicazione' max='9999' required>
		</div>
		<div class='from-group'>
		<label for='Posizione'>Posizione</label>	
			<input type='text' name='sezione' id='Posizione' class='form-control' placeholder='Sezione' maxlength='10' required>
			<input type='number' name='scaffale' id='Posizione' class='form-control' placeholder='Scaffale' required>
			<input type='text' name='ISBN' id='Posizione' class='form-control' placeholder='Codice ISBN' maxlength='20' required>
			<input type='text' name='edizione' id='Posizione' class='form-control' placeholder='Edizione' maxlength='30' required>
		</div>
		<div class='from-group'>
		<label for='CasaEditrice'>Casa Editrice</label>	
			<input type='text' name='nomecasaeditrice' id='CasaEditrice' class='form-control' placeholder='Nome' maxlength='30' required>
			<input type='text' name='cittàcasaeditrice' id='CasaEditrice' class='form-control' placeholder='Città' maxlength='30' required></td>
		</div>
		<div>
			<input type='submit' value='Aggiungi!' class='btn btn-primary'>
		</div>
		</div>
		</div>
		</form>
PRINT;
	require_once("header.php");
?>