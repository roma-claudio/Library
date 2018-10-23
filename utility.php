<?php

function check_session() {
	if (isset($_SESSION["Pwd"])) 
		return TRUE;
	else FALSE;
}

function print_banner() {
echo <<<PRINT
	<!DOCTYPE html>
	<html>
	<head>
  	<title>Biblioteca</title>
  	<!-- META -->
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<!-- META -->
  	<!-- CSS -->
  	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  	<link href="css/custom.css" rel="stylesheet" media="screen">
  	<!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  	<!-- CSS -->  
	</head>
	<body>
PRINT;
}



function print_menu() {
if (isset($_SESSION["Username"])) {
echo <<<PRINT
	<nav class="navbar navbar-default">
  	<div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href='index.php'>Biblioteca</a>
  	</div>
    <ul class="nav navbar-nav">
    <li><a href="index.php">Home</a></li>
    <li><a href="list.php">Catalogo</a></li>
    <li><a href="add.php">Aggiungi Copia</a></li>
    <li><a href="add2.php">Aggiungi Libro</a></li>
    <li><a href="remove.php">Rimuovi Copia</a></li>
    <li><a href="lends_grant.php">Concedi Prestito</a></li>
    <li><a href="lends_rev.php">Prestiti attivi</a></li>
    <li><a href="lends_rev_scaduti.php">Prestiti scaduti</a></li>
    <li><a href="history.php">Storico Prestito</a></li>
   	<ul class="nav navbar-nav navbar-right">
	<li><a href="logout.php">Esci</a></li>
	</ul>
    </ul>
  	</div>
	</nav>
	<div class='container'>
	<div class='row'>
	<div class='col-md-12'>
PRINT;
}
else{
echo <<<PRINT
	<nav class="navbar navbar-default">
  	<div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href='index.php'>Biblioteca</a>
  	</div>
  	<ul class="nav navbar-nav">
	<li><a href="index.php">Home</a></li>
	<li><a href="profile.php">Profilo</a></li>
	<li><a href="request.php">Richiedi Libro</a></li>
	<li><a href="review1.php">Recensisci libro</a></li></ul>
	<ul class="nav navbar-nav navbar-right">
	<li><a href="logout.php">Esci</a></li>
	</ul>
  	</div>
	</nav>
	<div class='container'>
	<div class='row'>
	<div class='col-md-12'>
PRINT;
}
}



function print_formlogin() {
echo <<<PRINT
	<center>
	<a href="register.php">Non sei registrato?</a>
	<form name="login" action="login.php" method="POST" >
	<input type="text" name="Email" placeholder="Email/Username">
	<input type="password" name="Pwd" placeholder="Password">
	<input type="submit" value="Accedi">
	</form>
	</center>
PRINT;
}

function print_footer() {
echo <<<PRINT
	</div>
	</div>
	</div>
	<center>
	Biblioteca Milano. Sede: Milano,Piazza Duomo 20122
	</center>
	<!-- JS -->
  	<script src="js/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
  	<!-- JS -->
	</body>
	</html>
PRINT;
}

function connect_db() {
	$con = pg_connect("host=localhost port=5432 dbname=Biblioteca user=postgres password=admin");
	if (!$con) {
		echo "Errore nella connessione al database: " . pg_last_error($con);
    exit;
	}
	return $con;
}

/*function redirect() {
 	location.href = "register_c.php";
}*/

function print_formregister_d() {
echo <<<PRINT
	<center>
	<form action="register_d2.php" method="POST">
	<table>
		<tr>
			<td>Nome</td><td><input type="text" name="Nome"></td>
		</tr>
		<tr>
			<td>Cognome</td><td><input type="text" name="Cognome"></td>
		</tr>
		<tr>
			<td>Username</td><td><input type="text" name="Username"></td>
		</tr>
		<tr>
			<td>Password</td><td><input type="password" name="Password"></td>
		</tr>
		<tr>
			<td></td><td><input type="submit" value="Invia"></td>
		</tr>
	</table>
	</form>
</center>
PRINT;
}
?>