<?php
	require_once("header.php");
?>
<center>
<table>
<form action="review2.php" method="POST">
	<tr>
		<td>Titolo :</td><td><input type="text" name="Titolo"></td>
	</tr>
	<tr>
		<td>Autore :</td><td><input type="text" name="Nome" value="Nome"></td>
	</tr>
	<tr>
		<td></td><td><input type="text" name="Cognome" value="Cognome"></td>
	</tr>
	<tr>
		<td>Giudizio :</td><td><input type="number" name="Giudizio"></td>
	</tr>
	<tr>
		<td>Commento :</td><td><textarea name="Commento" rows="10" cols="50"></textarea></td>
	</tr>
	<tr>
			<td></td><td><input type="submit" value="Pubblica"></td>
	</tr>
</form>
</table>
</center>