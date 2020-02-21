<?php
	session_start();
	if (!isset($_SESSION['id_usuario']))
	{
		header("location: index.php");
		exit;
	}


?>

<h2>Olá!</h2>


<a href="sair.php"> Sair </a>


