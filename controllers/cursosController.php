<?php
class cursosController extends controller {

	public function __construct(){
		parent::__construct();
		$alunos = new Alunos();

		if (!$alunos->isLogged()) {
			header("Location:".BASE."login");
		}
	}

	public function index() {
		header("Location:".BASE);
	}

	public function entrar($id) {
		//$this->debug($id,1);
		$dados = array(
			'info' => array(),
			'curso' => array(),
			'aulas' => array(),
			'modulos' => array()
		);

		$alunos = new Alunos();
		$alunos->setAluno($_SESSION['lgaluno']);
		$dados['info'] = $alunos;

		if ($alunos->isInscrito($id)) {
			//$this->debug('$id',1);

			$curso = new Cursos();
			$curso->setCurso($id);
			$dados['curso'] = $curso;

			$modulos = new Modulos();
			$dados['modulos'] = $modulos->getModulos($id);

			$this->loadTemplate('curso_entrar',$dados);
		}else{
			header("Location:".BASE);
		}
	}

	public function aula($id_aula){
		//$this->debug($id_aula,1);
		$dados = array(
			'info' => array(),
			'curso' => array(),
			'aula' => array(),
			'modulos' => array(),
		);

		$alunos = new Alunos();
		$alunos->setAluno($_SESSION['lgaluno']);
		$aluno = $alunos->getAluno();
		//$this->debug($alunos,1);

		$dados['info'] = $aluno;

		$aula = new Aulas();
		$id = $aula->getCursoDeAula($id_aula);

		//$this->debug($alunos,1);

		if ($alunos->isInscrito($id)) {
			//$this->debug('$id',1);

			$curso = new Cursos();
			$curso->setCurso($id);
			$dados['curso'] = $curso;

			$modulos = new Modulos();
			$dados['modulos'] = $modulos->getModulos($id);

			$dados['aula'] = $aula->getAula($id_aula);
			$dados['aula']['duvidas'] = array();
			$dados['aula']['duvidas'] = $aula->getDuvidas($alunos->getId(),$id_aula);
			//$this->debug($dados['aula'],1);
			if ($dados['aula']['tipo'] == 'video') {
				$view = 'curso_aula_video';
			}elseif ($dados['aula']['tipo'] == 'poll') {
				$view = 'curso_aula_poll';
				
			}


			if (isset($_POST['duvida']) && !empty($_POST['duvida'])) {
				$duvida = $_POST['duvida'];

				$aula->setDuvida($dados['aula']['id'],$alunos->getId(),$duvida);
			}

			$this->loadTemplate($view,$dados);
		}else{
			header("Location:".BASE);
		}

	}

}