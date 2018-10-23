<?php
require_once("utility.php");
		if (!isset($_SESSION["Email"])){
			session_start();
			$Error=false;
			$Email=$_POST["Email"];
			$Pwd=$_POST["Pwd"];
			$conn= connect_db();
			$query1= "SELECT nome,cognome,email,password,tipo FROM utente WHERE email='".$Email."' AND password='".$Pwd."'";
			$query2= "SELECT nome,cognome,username,password From dipendente WHERE username='".$Email."' AND password='".$Pwd."'";
			//echo $query;
			$execute_query1= pg_query($conn,$query1);
			if(!$execute_query1){  
				echo "Errore: ".pg_last_error($conn);
				exit;
			}	
			$row = pg_fetch_assoc($execute_query1);
			if ($row) {
				$_SESSION["Email"]=$Email;
				$_SESSION["Pwd"]=$Pwd;
				$_SESSION["Nome"]=$row['nome'];
				$_SESSION["Cognome"]=$row['cognome'];
				$_SESSION["Tipo"]=$row['tipo'];
				header("location:index.php");
				exit;
			}else{
				$execute_query2= pg_query($conn,$query2);
				if(!$execute_query2){  
				echo "Errore: ".pg_last_error($conn);
				exit;
				}	
				$row = pg_fetch_assoc($execute_query2);
				if ($row) {
				$_SESSION["Username"]=$Email;
				$_SESSION["Pwd"]=$Pwd;
				$_SESSION["Nome"]=$row['nome'];
				$_SESSION["Cognome"]=$row['cognome'];
				header("location:index.php");
				exit;
				}
			}
			if (!isset($_SESSION["Pwd"])){
				echo '<script type="text/javascript">alert(\'ID o password errate\'); window.location = \'index.php\';</script>';
				//header("location:index.php");
				exit;
			}	
		}
header("location:index.php");
require_once("footer.php");
?>