<?
class Conexao{
    private $pdo;
		public $msgErro = "";

		public function conectar($nome, $host, $usuario, $senha){
            global $pdo;
            /* Tentantiva de conexão com o banco de dados */
			try {
				$pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
			} catch (PDOException $e) {
				$msgErro=$e->getMessage();
			}
        }
?>