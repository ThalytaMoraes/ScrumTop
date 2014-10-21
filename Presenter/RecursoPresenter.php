<?php

if (!isset($_SESSION))
    session_start();

/* import */
include_once('../DAO/ProdutoBacklog.php');
/* */

class RecursoPresenter {

    // construtor
    public function __construct() {
        
    }

    public function __cadastroSimples($pnome, $pdescricao, $valor, $tipo) {
        $DAO = new RecursoDao();
        $DAO->__initialize();
        try {
            $DAO->__addrecurso($pnome, $pdescricao, $_SESSION['codigo'], $valor, $tipo);
            $retorno = 1;
        } catch (Exception $e) {
            $retorno = 0;
        }
        $DAO->__finalize();
         return $retorno;
    }

    public function __remove() {
        $DAO = new RecursoDao();
        $DAO->__initialize();
        try {
            $DAO->__removeProduct($_SESSION['codigo']);
            $retorno = 1;
        } catch (Exception $e) {
            $retorno = 0;
        }
        $DAO->__finalize();
        return $retorno;
    }
}
?>

