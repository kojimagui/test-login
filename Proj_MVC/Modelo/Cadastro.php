<?
	Class CadastroDAO{

		private $nome;
		private $telefone;
		private $email;
		private $senha;

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getTelefone(){
			return $this->nome;
		}

		public function setTelefone(){
			$this->telefone = $telefone;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail(){
			$this->email = $email;
		}

		public function getSenha(){
			return $this->senha;
		}

		public function setSenha(){
			$this->senha = $senha;
		}
		
	}
?>