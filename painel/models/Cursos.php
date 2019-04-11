<?php


class Cursos extends model{
	

	public function __construct(){
		parent::__construct();
	}

	public function getCursos(){
		$array = array();

		$sql = "SELECT 
			*, 
			(SELECT count(*) 
		FROM 
			aluno_curso WHERE aluno_curso.id = cursos.id ) as qtalunos 
		FROM cursos";

		//$this->debug($sql,1);


		$sql = $this->db->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;




	}


}

?>
