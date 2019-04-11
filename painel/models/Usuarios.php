<?php

class Usuarios extends model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function isLogged()
    {
        //echo $_SESSION['lgadmin'];
        if (isset($_SESSION['lgadmin']) && !empty($_SESSION['lgadmin'])) {
            return true;
        } else {
            return false;
        }
    }
    
    public function fazerLogin($email, $senha)
    {
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

				$this->debug($sql);

				$sql = $this->db->query($sql);
        
        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $_SESSION['lgadmin'] = $row['id'];

            #echo "Test: ".$_SESSION['lgaluno'];exit;

            return true;
        } else {
            return false;
        }
    }
}
