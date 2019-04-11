<?php  

class Modulos extends model{

	public function __construct(){
		parent::__construct();
	}
	
	public function getModulos($id_curso){
		$array = array();

		$sql = "SELECT * FROM modulos WHERE cd_curso = '1'";
		$sql = $this->db->query($sql);
		//$this->debug($sql->fetchAll(),1);


		if ($sql->rowCount() > 0) {

			$array = $sql->fetchAll();

			$aulas = new Aulas();

			foreach ($array as $mChave => $mDados) {
				//$this->debug($mDados,1);
				$array[$mChave]['aulas'] = $aulas->getAulasDoModulo($mDados['id']);

			}




		}

		return $array;
	}
}


?>