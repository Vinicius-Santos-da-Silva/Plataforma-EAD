<?php
class loginController extends controller {

	public function __construct(){
	} 

	public function index() {
		$dados = array();

		if (isset($_POST['email']) && !empty($_POST['email'])) {

			$email = addslashes($_POST['email']);
			$senha = md5($_POST['senha']);

			$usuario = new Usuarios();

			if ($usuario->fazerLogin($email,$senha)) {
				#echo "true";exit;
				header("Location:".BASE."home");
			}
		}

		$this->loadView('login', $dados);
	}

	public function logout(){
		unset($_SESSION['lgadmin']);
		header("Location:" .BASE."login");
	} 

}