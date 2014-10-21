<?php

if (!isset($_SESSION))
    session_start();

/* import */
include_once('../DAO/PlanejamentoDAO.php');
/* */

class PlanejamentoPresenter {

    // construtor
    public function __construct() {
        
    }

    public function __cadastroSimples($local, $hora, $quanr,$ob) {


        $DAO = new PlanejamentoDao();
        $DAO->__initialize();
        try {
            $DAO->__cadastroSimples($_SESSION['codigo'], $local, $hora, $quanr, $_SESSION['codigo'],$_SESSION['codigo'],$ob);
            $retorno = 1;
        } catch (Exception $e) {
            $retorno = 0;

        }
        $DAO->__finalize();
     
        return $retorno;
    }
   public function __remove($p) {


        $MembroDAO = new ProdutoBacklogDAO();
        $MembroDAO->__initialize();
        try {
          
            $MembroDAO->__removeProduct($_SESSION['codigo'],$p);
            $retorno = 1;
        } catch (Exception $e) {
            $retorno = 0;

        }
        $MembroDAO->__finalize();
        echo $retorno;
        return $retorno;
    }
}

?>

