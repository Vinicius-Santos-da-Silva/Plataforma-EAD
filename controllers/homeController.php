<?php
class homeController extends controller {

	public function __construct(){
		parent::__construct();
		$alunos = new Alunos();

		if ($alunos->isLogged()) {
			header("Location:".BASE."login");
		}
	}

	public function index() {
		$alunos = new Alunos();
		
		if ($alunos->isLogged()) {
			header("Location:".BASE."login");
		}

		$dados = array(
			'info' => array()
		);

		//$this->debug($_SESSION);

		
		$alunos->setAluno($_SESSION['lgaluno']);
		$dados['info'] = $alunos;
		
		$cursos = new Cursos();
		$dados['cursos'] = $cursos->getCursosDoAluno($alunos->getId());
			//$this->debug($dados['cursos'],1);



		$this->loadTemplate('home',$dados);
	}

}