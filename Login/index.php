<?php
	require_once 'Classes/usuarios.php';
	$u = new usuario;
?>
<!DOCTYPE html>
<!-- TELA DE LOGIN -->
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>Tela de login</title>
	<link rel="stylesheet" href="CSS/aparencia.css">
</head>
<body>
	<div id="form">
		<h1>
			Acessar
		</h1>
	<form method="post">
		<input type="email" name="email" placeholder="Usuário">
		<input type="password" name="senha" placeholder="Senha">
		<input type="submit" name="Entrar" value="Entrar">
		<a href="cadastrar.php">Criar uma conta</a>
	</form>
	</div>
	<?php
	if (isset($_POST['email']))
		{
			$email = addslashes($_POST['email']);
			$senha = addslashes($_POST['senha']);

			/* Verificação de preenchimento */
			if (!empty($email) && !empty($senha))
			{
				$u->conectar("acessos", "localhost", "root", "");
				if ($u->msgErro =="")
				{
					if ($u->logar($email, $senha))
					{
						header("location:areaprivada.php");
					}
					else
					{
						echo "Usuário e/ou senha inválidos";
					}
				}
				else
				{
					echo "Erro: ".$u->msgErro;
				}
			}
			else
			{
				echo "Preencha todos os campos";
			}
		}
	?>
</body>
</html>