<?php
	require_once("header.php");
	$_SESSION["idlibro"]=$_POST["idlibro"];
	//echo $_SESSION["idlibro"];
echo <<<PRINT
<center>
<table>
<form action="review_script.php" method="POST">
	<tr>
		<td>Giudizio :</td><td><input type="number" name="Giudizio" min='1' max='5'></td>
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
PRINT;
require_once("footer.php");
?>