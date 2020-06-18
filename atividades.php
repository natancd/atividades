<?php
	require '/header.php';
?> 

<?php
session_start();
// de acordo com a opção selecionada em pagina.php, será encaminhado para a página específica
if ($_POST['atividade'] == 'add')
{
	header('Location: add.php');
}
else if ($_POST['atividade'] == 'listar_abertas')
{
	header('Location: listar_abertas.php');
}
else if ($_POST['atividade'] == 'listar_concluidas')
{
	header('Location: listar_concluidas.php');
}
else if ($_POST['atividade'] == 'editar')
{
	header('Location: editar.php');
}
else if ($_POST['atividade'] == 'remover')
{
	header('Location: remover.php');
}
	
?>

<?php
	include '/footer.php';
?>