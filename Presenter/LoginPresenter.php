<?php

if (!isset($_SESSION))
    session_start();

/* import */
include_once('../DAO/LoginDAO.php');
/* */

class LoginPresenter {

    // construtor
    public function __construct() {
        
    }

    public function __redi($usuario) {

        if (isset($_SESSION)) {
             
               $_SESSION['usuario'] = $usuario;
               
               header("Location: ..\EstruturaPagina\MembroProjeto.php");
        }
    }

    // destrutor
    public function __destruct() {
        
    }

    public function __login($pUsuario, $pSenha) {

        $retorno = 'FALSE';
        $dados = 0;
        $LoginDAO = new LoginDAO();
        $LoginDAO->__initialize();
    
        try {
            
            $dados = $LoginDAO->__login($pUsuario, $pSenha);
            ;
        } catch (Exception $e) {
            
        }
        $LoginDAO->__finalize();
        if ($dados != NULL) {
            
            $retorno = $dados;
            if (!isset($_SESSION))
                session_start();
            $_SESSION['usuario'] = $dados[0];
            $_SESSION['senha'] = $dados[1];
            $_SESSION['logado'] = 'logado';
            
        }
        
        return $retorno;
    }


}

?>