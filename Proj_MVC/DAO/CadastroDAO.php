<?

    Class CadastroDAO{
        
        
        public function cadastrar($nome, $telefone, $email, $senha){
			global $pdo;
			/* Verificar se o email já está cadastrado */
			$sql=$pdo -> prepare("SELECT id_usuario FROM usuarios WHERE email = :e");
			$sql->bindValue(":e", $email);
			$sql->execute();
			if ($sql->rowCount() > 0){ /* Maior que zero -> já cadastrado */
				return false;
			}
			else{
				/*Caso o email não esteja cadastrado */
				$sql=$pdo->prepare("INSERT INTO usuarios (nome, telefone, email, senha) VALUES (:n, :t, :e, :s)");
				$sql->bindValue(":n",$nome);
				$sql->bindValue(":t",$telefone);
				$sql->bindValue(":e",$email);
				$sql->bindValue(":s",md5($senha));
				$sql->execute();
				return true; /* Cadastro efetuado com sucesso */
			}

    }


?>