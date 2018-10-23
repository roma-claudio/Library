<?php
	session_start();
	require_once("utility.php");
	echo "<div class='page-header'>";
	print_banner();

	if (check_session()) {
		print_menu();
	}
	else{
		print_formlogin();
	}
	echo "</div>";
?>