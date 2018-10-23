<?php
 	require_once("header_register.php");
echo <<<PRINT
<center>
<div class='row'>
	<div class='col-md-6 col-md-offset-3'>
	<button onclick="redirect(0)" class="btn">Registrati come utente</button>
	<button onclick="redirect()" class="btn">Registrati come dipendente</button>
</div>
</div>
</center>
<script>
function redirect(a) {
	if (a==0)
    	location.href = "register_c.php";
    else
    	location.href = "register_d.php";
}
</script>
PRINT;
	require_once("footer.php");
?>