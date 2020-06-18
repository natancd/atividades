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
			
		// A FAZER puxar os dados da página anterior;
		// 	$sql = "SELECT * FROM atividades
		//			WHERE titulo = '".$titulo."' AND descricao = '".$descricao."' AND tipo = '".$tipo."'";
		
		pg_query($conn, $query);
		
		// A FAZER deletar após seleção
		
		//  $sql = "DELETE FROM atividades WHERE concluida = '$_POST['alteracao'] 
	}
	?>
<form method="post" align="center" action="<?php $_SERVER['PHP_SELF'] ?>">
	<form method="post" action="pagina.php" align="center">
		<input type="submit" value="Voltar" />
	</form><br/>
<form method="post" action="pagina.php" align="center">
	<input type="submit" value="Voltar" />
</form><br/>

<?php
	include '/footer.php';
?>