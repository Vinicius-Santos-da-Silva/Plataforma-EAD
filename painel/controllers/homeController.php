<?php
class homeController extends controller {

	public function __construct(){
		parent::__construct();
		$usuario = new Usuarios();

		if (!$usuario->isLogged()) {
			header("Location:".BASE."login");
		}

	}

	public function index() {
		$dados = array(
			'cursos' => array(),
		);

		$cursos = new Cursos();

		$dados['cursos'] = $cursos->getCursos();
		//$this->debug($dados);

		$this->loadTemplate('home',$dados);
	}

}