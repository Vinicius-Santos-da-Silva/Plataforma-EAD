<?php 
/**
 * 
 */
class Aulas extends model{

	public function __construct(){
		parent::__construct();
	}

	public function marcarAssistido($id){
		$aluno = $_SESSION['lgaluno'];
		$sql = "INSERT INTO historico SET data_viewed = NOW() , id_aluno = '$aluno' , id_aula = '$id'";
		$this->db->query($sql);
	}
	
	public function getAulasDoModulo($id){
		$array = array();

		$sql = "SELECT *FROM aulas WHERE cd_modulo = '$id' ORDER BY ordem";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0 ) {
			$array = $sql->fetchAll();

			foreach ($array as $aulachave => $aula) {
				$id_aula = $aula['id'];
				
				if ($aula['tipo'] == 'video') {
					//$this->debug($aula,1);
					$sql =  "SELECT nome FROM videos WHERE cd_aula = $id_aula";
					$sql = $this->db->query($sql)->fetch();

					$array[$aulachave]['nome'] = $sql['nome'];
				}
				elseif ($aula['tipo'] == 'poll') {
					$array[$aulachave]['nome'] = "Questionário";
				}
			}
		}

		return $array;
	}

	public function getCursoDeAula($id_aula){

		$sql = "SELECT cd_curso FROM aulas WHERE id = '$id_aula'";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0 ) {
			$row = $sql->fetch();
			return $row['cd_curso'];
		}else{
			return 0;
		}
	}

	public function getAula($id_aula){
		$array = array();
		$aluno = $_SESSION['lgaluno'];
		$sql = "
		SELECT 
			tipo,
			(select count(*) from historico where historico.id_aula = aulas.id and historico.id_aluno = '$aluno') as assistido
		FROM 
			aulas 
		WHERE 
			id = '$id_aula'";
		$sql = $this->db->query($sql);

		//$this->debug($sql->fetch(),1);


		if ($sql->rowCount() > 0) {
			$row = $sql->fetch();
			//$this->debug($row,1);
			//$this->debug($row['tipo'],1);
			if ($row['tipo'] == 'video') {
				$sql = "SELECT * FROM videos WHERE  cd_aula = '$id_aula'";
				$sql = $this->db->query($sql);
				$array = $sql->fetch(); 
				$array['tipo'] = 'video';

			}
			elseif ($row['tipo'] == 'poll') {
				$sql = "SELECT * FROM questionarios WHERE  cd_aula = '$id_aula'";
				$sql = $this->db->query($sql);

				$array = $sql->fetchAll(); 
				$array['tipo'] = 'poll';
				//$this->debug($array,1);
			}
			//$this->debug($row,1);

			$array['assistido'] = $row['assistido'];

		}

		return $array;
	}

	public function setDuvida($id_aula,$id_aluno,$duvida){
		$sql = "INSERT INTO duvidas (cd_aula,cd_aluno,duvida) VALUES($id_aula,$id_aluno,'$duvida')";
		//$this->debug($sql,1);
		$sql = $this->db->query($sql);
	}

	public function getDuvidas($id_aluno,$id_aula){
		$array = array();

		$sql = "SELECT * FROM duvidas WHERE cd_aula = '$id_aula' AND cd_aluno = '$id_aluno' ORDER BY datahora_cadastro DESC";
		$sql =  $this->db->query($sql);

		#$this->debug($sql->rowCount(),1);

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;

	}

}


 ?>