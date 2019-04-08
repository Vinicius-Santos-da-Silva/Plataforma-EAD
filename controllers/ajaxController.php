<?php
class ajaxController extends controller {

	public function __construct(){
		parent::__construct();
		$alunos = new Alunos();

		if ($alunos->isLogged()) {
			header("Location:".BASE."login");
		}
    }
    
    public function marcarAssistido($id){
        //$this->debug('ajax');
        $aula = new Aulas();
        $aula->marcarAssistido($id);
    }



}