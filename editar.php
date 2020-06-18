<?php
	require '/header.php';
?> 
<h2>Selecione uma atividade</h2>
<table border="1" style="width:75%; margin-left:auto; margin-right:auto;">
	<tr>
		<th style="width:20%">Título</th>
		<th style="width:100%">Descrição</th>
		<th style="width:12%">Tipo
		<th style="width:4%">Concluída?</th>
	</tr>
	<?php
		session_start();
		define ("MINIMO_HORA", 13);
		$output = ""; //variável para guardar o valor para os loops 
		$conn = pg_connect("host=127.0.0.1 dbname=atividade user=db_user password=12345678" ); // conecta na database
		// solicita a query da database
		$sql = "SELECT * FROM atividades";
		$result = pg_query($conn, $sql);
		$records = pg_num_rows($result);
		
		// verifica se é sexta-feira às 13h
		if ((date('w') == 5 and date('H', MINIMO_HORA)))
		{
			$error .="<p style=\"color:red;\">Não é possível adicionar uma Manutenção urgente nas sextas-feiras após às " .MINIMO_HORA. "h!</span>";	
		}
		// gerando a tabela
		for($i = 0; $i < $records; $i++) //  loop em todos os dados puxados da database e disponibiliza o output
		{  
			$output .= "\n\t<tr>\n\t\t<td><input name='alteracao[]' type='checkbox'>".pg_fetch_result($result, $i, "titulo")."</td>"; 
			$output .= "\n\t\t<td align='center'>".pg_fetch_result($result, $i, "descricao")."</td>"; 
			$output .= "\n\t\t<td align='center'>".pg_fetch_result($result, $i, "tipo")."</td>";
			$output .= "\n\t\t<td align='center'>".pg_fetch_result($result, $i, "concluida")."</td>";
		}
		echo $output; // resultado final
	?>

</table><br/><br/>

<form method="post" action="pagina.php" align="center">
	<input type="submit" value="Voltar" />
</form><br/>

<form method="post" action="editar_atividade.php" align="center">
	<input type="submit" value="Próximo" />
</form>
<?php
	include '/footer.php';
?>