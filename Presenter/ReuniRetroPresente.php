<?php

if (!isset($_SESSION))
    session_start();

/* import */
include_once('../DAO/ProjetoDAO.php');
/* */

class ReuniRetro {

    // construtor
    public function __construct() {
        
    }

    public function __cadastroSimples($ptitulo, $descricao,$codsp,$codpro) {

        $retorno = FALSE;

        $DAO = new ReuniRetroDAO();
        $DAO->__initialize();
        try {
            $DAO->__addPontosPositivo($ptitulo, $descricao, $codpro, $codsp);
            $retorno = TRUE;
        } catch (Exception $e) {
            
        }
        $DAO->__finalize();

        return $retorno;
    }
    
      public function __cadastroSimplesN($ptitulo, $descricao,$codsp,$codpro) {

        $retorno = FALSE;

        $DAO = new ReuniRetroDAO();
        $DAO->__initialize();
        try {
            $DAO->__addPontosPositivo($ptitulo, $descricao, $codpro, $codsp);
            $retorno = TRUE;
        } catch (Exception $e) {
            
        }
        $DAO->__finalize();

        return $retorno;
    }

}

?>
