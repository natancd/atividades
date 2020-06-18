<?php
	require '/header.php';
?>
<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
	{		
		$conn = pg_connect("host=127.0.0.1 dbname=atividade user=db_user password=12345678");  // conecta com a database
		
		$login = trim($_POST["login"]); // variável para o login (na tabela)
		$password = trim($_POST["password"]); // variável para a sena (na tabela)
		$output = ""; // variável em branco para inicializar
		$error = ""; // variável em branco para inicializar
		// puxa os dados da database e verifica se o usuário está registrado
		$sql = "SELECT user_id
				FROM users
				WHERE user_id = '".$login."' AND password = '".$password."'";
		$result = pg_query($conn, $sql);
		$records = pg_num_rows($result);
			
		if($records > 0) // está registrado, será encaminhado para a página principal
		{
			header('Location: pagina.php');
		}
		else // login ou senha inválidos
		{
			$sql = "SELECT * FROM users WHERE user_id = '".$login."'";
			$result = pg_query($conn, $sql);
		
			$error = "Usuário/senha não conferem.";
			echo $error;
			if(!pg_num_rows($result))
			{
				$login = "";
			}	
		}
	}
?>
<form method="post" action="login.php" align="center" action="<?php $_SERVER['PHP_SELF'] ?>">
	<p>LOGIN</p><br/>
	É necessário fazer o login para continuar: <br/><br/>
	LOGIN:  <input type="text" name="login" id="login" placeholder="Login"/><br/>
	SENHA:<input type="password" name="password" id="password" placeholder="Senha"/><br/><br/>
	<input type="submit" value="ACESSAR"  />
</form>
<?php
	include 'footer.php';
?>