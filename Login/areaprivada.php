<?php
	session_start();
	if (!isset($_SESSION['id_usuario']))
	{
		header("location: index.php");
		exit;
	}


?>

Olá

<a href="sair.php"> Sair </a>


