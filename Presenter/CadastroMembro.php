<?php

if (!isset($_SESSION))
    session_start();

/* import */
include_once('../DAO/MembroDAO.php');
/* */

class CadastroMembroPresenter {

    // construtor
    public function __construct() {
        
    }

    public function __cadastroSimples($nome, $snome, $mail, $senha, $instituto, $telefone,$skype) {


        $MembroDAO = new MembroDAO();
        $MembroDAO->__initialize();
        try {
            $MembroDAO->__cadastroMembroSimples($nome, $snome, $mail, $senha, $instituto, $telefone,$skype);
         
        } catch (Exception $e) {
    

        }
        $MembroDAO->__finalize();
 
    }

}

?>
