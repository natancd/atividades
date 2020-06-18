<?php
	require '/header.php';
?> 

<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{		
	define ("MINIMO_CARACTERES", 50); // constante para o máximo de caracteres
	define ("MINIMO_HORA", 13); // constante para o mínimo da hora
	$conn = pg_connect("host=127.0.0.1 dbname=atividade user=db_user password=12345678" );  // conecta como a database
	
	$titulo = trim($_POST["titulo"]); // variável para o login (na tabela)
	$descricao = trim($_POST["descricao"]); // variável para a senha (na tabela)
	$tipo = trim($_POST["tipo"]); // variável para o tipo (na tabela)

	$error = ""; // variável em branco para mensagem de erro
	
	$result = pg_query($conn, $sql);
	$records = pg_num_rows($result);
	
	// verifica se foi digitada alguma informação no título
	if(strlen($titulo) == 0)
	{
		$error .= "<p style=\"color:red;\">O título é necessário!</span>";
	}	
	// verifica se foi digitada alguma informação na descrição
	if(strlen($descricao) == 0)
	{
		$error .= "<p style=\"color:red;\">A descrição é necessária!</span>";
	}	
	// verifica se há pelo menos 50 caracteres digitados
	else if (strlen($descricao) < MINIMO_CARACTERES)
	{
		$error .= "<p style=\"color:red;\">A descrição necessita ao menos " .MINIMO_CARACTERES. " caracteres.</span>";
	}
	
	// verifica se foi digitada alguma informação na descrição
	if(strlen($tipo) == 0)
	{
		$error .= "<p style=\"color:red;\">É necessário escolher ao menos um tipo!</span>";
	}
	
	// verifica se o dia de hoje é sexta e após 13h
	if ((date('w') == 5 and date('H', MINIMO_HORA)))
	{
		$error .="<p style=\"color:red;\">Não é possível adicionar uma Manutenção urgente nas sextas-feiras após às " .MINIMO_HORA. "h!</span>";	
	}		
	
	echo $error; // informa o(s) erro(s), caso haja
	if ($error == "") // caso não tenha erros
	{	// adiciona os dados inseridos na database
		$query = "INSERT INTO atividades(titulo, descricao, tipo, concluida) 
			   VALUES ('$titulo', '$descricao', '$tipo', 'não')";
		pg_query($conn, $query);
		header('Location: sucesso.php');	// encaminha para uma página informando que foi cadastrado com sucesso	
	}
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
<?php
	include '/footer.php';
?>