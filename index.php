<?php
	require 'header.php';
?>

<?php 
session_start();
if($_SESSION["login"] != 1)
{ // se o usuário não está logado
    header('Location: login.php');
}
	else
{ // se ele estiver logado
	header('Location: pagina.php');
}
?>

<?php
	include 'footer.php';
?>