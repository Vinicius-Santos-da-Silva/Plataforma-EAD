<?php


class Cursos extends model{
	
	public $info;

	public function __construct(){
		parent::__construct();
	}

	public function getCursosDoAluno($id){

		$array = array();
		$sql = "
		SELECT 
		aluno_curso.cd_curso,
		cursos.nome,
		cursos.imagem,
		cursos.descricao
		FROM 
		aluno_curso
		LEFT JOIN cursos 
		ON aluno_curso.cd_curso = cursos.id WHERE aluno_curso.cd_aluno = $id";

		$sql = $this->db->query($sql);

		//print_r($sql);exit;

		if ($sql->rowCount() > 0 ) { 
			$array = $sql->fetchAll();
			//$this->debug($array);

		}
		return $array;		
	}

	public function setCurso($id){
		$sql = "SELECT * FROM cursos WHERE id = '$id'";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$this->info = $sql->fetch();
			//$this->debug($this->info['descricao']);
		}

	}

	public function getNome(){
		return $this->info['nome'];
	}

	public function getImagem(){
		return $this->info['imagem'];

	}
	public function getDescricao(){
		return $this->info['descricao'];

	}
}

?>
