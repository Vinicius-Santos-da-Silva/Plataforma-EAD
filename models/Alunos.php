<?php 

class Alunos extends model{

	private $info;

	public function __construct(){
		parent::__construct();
	}

	public function isLogged(){
		//echo $_SESSION['lgalunos'];
		if (!isset($_SESSION['lgaluno']) && !empty($_SESSION['lgaluno'])) {
			return true;
		}else{
			return false;
		}
	}

	public function fazerLogin($email,$senha){
		$sql = "SELECT * FROM alunos WHERE email = '$email' AND senha = '$senha'";

		$sql = $this->db->query($sql);
		
		if ($sql->rowCount() > 0 ) {
			$row = $sql->fetch();
			$_SESSION['lgaluno'] = $row['id'];

			#echo "Test: ".$_SESSION['lgaluno'];exit;

			return true;

		}else{
			return false;
		}
	}

	public function getAluno(){
		return $this->info;
	}

	public function setAluno($id){
		$sql = "SELECT * FROM alunos WHERE id = '$id'";
		$sql = $this->db->query($sql);
		if ($sql->rowCount() > 0 ) {
			$this->info = $sql->fetch();
			//$this->debug($this->info,1);
		}
	}

	public function getNome(){
		return $this->info['nome'];
	}

	public function getId(){
		return $this->info['id'];
	}

	public function isInscrito($id_curso){
		//$this->dubug($this->info);
		$sql = "SELECT * FROM aluno_curso WHERE cd_aluno = '".($this->info['id'])."' AND cd_curso = '$id_curso'";

		$sql = $this->db->query($sql);

		//$this->debug($sql,0);

		if ($sql->rowCount() > 0) {
			return true;
		}else{
			return false;
		}

	}




}

?>