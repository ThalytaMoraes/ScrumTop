<?php

if (!isset($_SESSION))
    session_start();
include_once('AbstractDao.php');

class LoginDAO extends AbstractDao {

    // Construtor
    public function __construct() {
        parent::__construct();
    }

    public function __login($pUsuario, $pSenha) { # Verifica email e senha
        try {
            $retorno = NULL;
            $this->__executeSQL("
                        select * from scrumtop.login
                        where usuario = '" . $pUsuario . "' and senha = '" . $pSenha . "'
                           
                ");


            if ($this->__returnLinesSQL() > 0) {

                $retorno[0] = $this->__returnSpecificContentSQL(0, "usuario");
                $retorno[1] = $this->__returnSpecificContentSQL(0, "senha");
            }




            return $retorno;
        } catch (Exception $e) {


            throw $e;
        }
    }

}

?>
