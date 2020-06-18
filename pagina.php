<?php
	require '/header.php';
?> 
<?php
session_start();
echo "Bem-vindo!";
?>
<br/><br/>
Selecione umas das opções abaixo:<br/>

<form method="post" action="atividades.php">
	<input type="radio" name="atividade" value="add" checked />Adicionar uma nova atividade<br/>
	<input type="radio" name="atividade" value="listar_abertas" />Listar atividades em aberto<br/>
	<input type="radio" name="atividade" value="listar_concluidas"/>Listar todas as atividades concluídas<br/>
	<input type="radio" name="atividade" value="editar"/>Editar atividade<br/>
	<input type="radio" name="atividade" value="remover"/>Remover atividade<br/><br/><br/>
<input type="submit" value="Próximo" />

<?php
	include '/footer.php';
?>