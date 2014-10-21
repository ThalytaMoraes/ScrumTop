<?php

if (!isset($_SESSION))
    session_start();

/* import */
include_once('../DAO/ProdutoBacklog.php');
/* */

class CadastroBLPresenter {

    // construtor
    public function __construct() {
        
    }

    public function __cadastroSimples($pdesc, $pestimativa, $status) {


        $MembroDAO = new ProdutoBacklogDAO();
        $MembroDAO->__initialize();
        try {
            $MembroDAO->__addProduct($pdesc, $pestimativa, $status, $_SESSION['codigo']);
            $retorno = 1;
        } catch (Exception $e) {
            $retorno = 0;

        }
        $MembroDAO->__finalize();
       
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

