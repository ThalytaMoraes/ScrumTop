<?php

if (!isset($_SESSION))
    session_start();

/* import */
include_once('../DAO/ProjetoDAO.php');
/* */

class ProjetoPresenter {

    // construtor
    public function __construct() {
        
    }

    public function __cadastroSimples($pnome, $scrummaster, $data, $proi, $info) {

        $retorno = FALSE;

        $alunoDAO = new AlunoDAO();
        $alunoDAO->__initialize();
        try {
            $alunoDAO->__cadastroAlunoSimples($pnome, $scrummaster, $data, $proi, $info);
            $retorno = TRUE;
        } catch (Exception $e) {
            
        }
        $alunoDAO->__finalize();

        return $retorno;
    }

}

?>