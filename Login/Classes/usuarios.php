<?php  
	Class usuario{
		private $pdo;
		public $msgErro = "";

		public function conectar($nome, $host, $usuario, $senha){
			global $pdo;
			try {
				$pdo = new PDO("mysql: dbname=".$nome.";host=".$host,$usuario,$senha);
			} catch (PDOException $e) {
				$msgErro=$e->getMessage();
			}
			
		}

		public function cadastrar($nome, $telefone, $email, $senha){
			global $pdo;
			/* Verificar se o email já está cadastrado */
			$sql=$pdo -> prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
			$sql->bindValeu(":e",$email);
			$sql->execute();
			if ($sql->rowCount() > 0){ /* Maior que zero -> já cadastrado */
				return false;
			}
			else{
				/*Caso o email não esteja cadastrado */
				$sql=$pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
				$sql->bindValeu(":n",$nome);
				$sql->bindValeu(":t",$telefone);
				$sql->bindValeu(":e",$email);
				$sql->bindValeu(":s",md5($senha));
				$sql->execute();
				return true; /* Cadastro efetuado com sucesso */
			}

		}

		public function logar($email, $senha){
			global $pdo;
			/* Verificar se o email e senha estão cadastrados. se sim */
			$sql=$pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :e AND senha = :s");
			$sql->bindValeu(":e", $email);
			$sql->bindValeu(":s", md5($senha));
			$sql->execute();
			if ($sql->rowCount() > 0){
				/* Sessão iniciada */
				$dado = $sql->fetch();
				session_start();
				$_SESSION['id_usuario'] = $dado['id_usuario'];
				return true; /* Usuário logado */
			}
			else{
				/* Se não, sessão NÃO iniciada */
				return false;
			}

		}
	}


?>


