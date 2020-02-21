<?php
session_start();
unset($_SESION['id_usuario']);
header("location:index.php");
?>