<?php
	require '/header.php';
?> 

<table border="1" style="width:75%; margin-left:auto; margin-right:auto;">
	<tr>
		<th style="width:20%">Título</th>
		<th style="width:100%">Descrição</th>
		<th style="width:12%">Tipo
		<th style="width:4%">Concluída?</th>
	</tr>
	<?php
		session_start();
		// selecionar a atividade do "editar.php" e disponibilizar abaixo

			
		$conn = pg_connect("host=127.0.0.1 dbname=atividade user=db_user password=12345678" );  
			
		// FAZER puxar os dados da página anterior;
		// 	$sql = "SELECT * FROM atividades
		//			WHERE titulo = '".$titulo."' AND descricao = '".$descricao."' AND tipo = '".$tipo."'";
		
		pg_query($conn, $query);
	}
	?>
<form method="post" align="center" action="<?php $_SERVER['PHP_SELF'] ?>">
	
	<h2 align="center">Adicione as atividades</h2><br/>
	<div align="center">
		Título:   	<input type="text" name="titulo" id="titulo" value="<?php echo isset($_POST["titulo"]) ? $_POST["titulo"] : ''; ?>"/><br/>
		Descrição:	<input type="text" name="descricao" id="descricao" value="<?php echo isset($_POST["descricao"]) ? $_POST["descricao"] : ''; ?>"/><br/>
		Tipo:  		<select name="tipo" value="<?php echo isset($_POST["tipo"]) ? $_POST["tipo"] : ''; ?>" />
						<option value=""></option>
						<option value="desenvolvimento">Desenvolvimento</option>
						<option value="atendimento">Atendimento</option>
						<option value="manutencao">Manutenção</option>
						<option value="manutencao_urgente">Manutenção urgente</option>
					</select>
	</div><br/>
	<input type="submit" value="Adicionar"  />
	</form>
	<form method="post" action="pagina.php" align="center">
		<input type="submit" value="Voltar" />
	</form><br/>
	
<form method="post" action="pagina.php" align="center">
	<input type="submit" value="Voltar" />
</form><br/>

<?php
	include '/footer.php';
?>