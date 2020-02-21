<?php
	require_once 'Classes/usuarios.php';
	$u = new usuario;
?>
<!-- TELA DE CADASTRO -->
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<title>Tela de cadastro</title>
	<link rel="stylesheet" href="CSS/aparencia.css">
</head>
<body>
	<div id="form">
		<h1>
			Cadastrar
		</h1>
	<form method="post">
		<input type="text" name="nome" placeholder="Nome completo" maxlength="30">
		<input type="text" name="telefone" placeholder="Telefone" maxlength="20">
		<input type="email" name="email" placeholder="E-mail" maxlength="30">
		<input type="password" name="senha" placeholder="Senha" minlength="6" maxlength="15">
		<input type="password" name="confirmarSenha" placeholder="Confirme sua senha" minlength="6" maxlength="15">
		<input type="submit" name="Entrar" value="Entrar">
	</form>
	</div>
	<?php
	/* Verificação do clique */
		if (isset($_POST['nome']))
		{
			$nome = addslashes($_POST['nome']);
			$telefone = addslashes($_POST['telefone']);
			$email = addslashes($_POST['email']);
			$senha = addslashes($_POST['senha']);
			$confirmarSenha = addslashes($_POST['confirmarSenha']);

			/* Verificação de preenchimento */
			if (!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
			{
				$u->conectar("acessos", "127.0.0.1", "root", "");
				if ($u->msgErro == "") /* Tudo certo */
				{
					if ($senha == $confirmarSenha){
						if ($u->cadastrar($nome, $telefone, $email, $senha))
						{
							echo "Cadastro efetuado com sucesso!";
						}
						else
						{
							echo "E-mail já cadastrado";
						}
					}
					else
					{
						echo "As senhas não coincidem";
					}
					
				}
				else
				{
					echo "Erro: ".$u->msgErro;
				}
			}
			else
			{
					echo "Preencha todos os campos corretamente!";
			}
		}	
	?>
</body>
</html>