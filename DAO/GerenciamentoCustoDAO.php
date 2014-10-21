<?php

if (!isset($_SESSION))
    session_start();
include_once('AbstractDao.php');

class RecursoDao extends AbstractDao {

    public function __construct() {
        parent::__construct();
    }

    public function __addrecurso($pnome, $pdescricao, $cod, $valor, $tipo) { 
        try {

            $this->__executeSQL("
                INSERT INTO `scrumtop`.`recurso` (`nome`, `descricao`, `valor`,  `codprojeto`, `tipo`)
                VALUES ('$pnome', '$pdescricao', '$valor', '$cod', '$tipo');
             ");
        } catch (Exception $e) {
            throw $e;
        }
    }

     function __SomaRH($codProjeto){
         
          try {
            $x = $this->__executeSQL("    
                   select sum(valor) from `recurso` where codprojeto = '" . $codProjeto . "' and tipo = 'Recurso Humano' ");
            
            $i = 0;
              while ($this->__returnLinesSQL() > $i) {
                $item = $this->__returnSpecificContentSQL($i, 'sum(valor)');
               

                $i++;
            }
            if($item == null ){
                return 0;
            }else {
            return $item;
            
            }
          } catch (Exception $e) {
            throw $e;
         }
   }
   
       function __SomaRe($codProjeto){
         
          try {
            $x = $this->__executeSQL("    
                   select sum(valor) from `recurso` where codprojeto = '" . $codProjeto . "' and tipo = 'Recurso Externo' ");
            $i = 0;
             while ($this->__returnLinesSQL() > $i) {
                $item = $this->__returnSpecificContentSQL($i, 'sum(valor)');
               

                $i++;
            }
            if($item == null ){
                return 0;
            }else {
            return $item;
            
            }
          } catch (Exception $e) {
            throw $e;
         }
   }
       function __SomaRm($codProjeto){
         
          try {
            $x = $this->__executeSQL("    
                   select sum(valor) from `recurso` where codprojeto = '" . $codProjeto . "' and tipo = 'Recurso Material' ");
            $i = 0;
             while ($this->__returnLinesSQL() > $i) {
                $item = $this->__returnSpecificContentSQL($i, 'sum(valor)');
               

                $i++;
            }
            if($item == null ){
                return 0;
            }else {
            return $item;
            
            }
          } catch (Exception $e) {
            throw $e;
         }
   } 
    public function __removerecurso($item) { 
        try {
            $this->__executeSQL("       DELETE FROM `scrumtop`.`recurso` WHERE `recurso`.`item` = $item");
        } catch (Exception $e) {
            throw $e;
        }
    }
    
    

    public function __Retornarecursos($codProjeto) {
        try {
            $this->__executeSQL("
                        select * from `recurso` where codprojeto = '" . $codProjeto . "'");
            $i = 0;
            while ($this->__returnLinesSQL() > $i) {
                $item = $this->__returnSpecificContentSQL($i, 'item');
                $descricao = $this->__returnSpecificContentSQL($i, 'descricao');
                $pnome = $this->__returnSpecificContentSQL($i, 'nome');
                $valor = $this->__returnSpecificContentSQL($i, 'valor');
                $tipo = $this->__returnSpecificContentSQL($i, 'tipo');
                echo '<tr>  
                                    <td>' . $item . '</td>
                                    <td> ' . $pnome . '</td>
                                    <td> ' . $descricao . ' </td>
                                    <td> ' . $tipo . '</td>
                                    <td> ' . $valor . '</td>
                                  <td>
                           <a href="../Post/EditarRecustopost.php?item=' . $item . ' "> <img src="delete.png" width="16" height="16")"/> </a>
                          </td>
                        </tr>';

                $i++;
            }
        } catch (Exception $e) {


            throw $e;
        }
    }
     public function __removeProduct($cod, $item) { 
        try {
            $retorno = NULL;
            $this->__executeSQL("
                DELETE FROM `scrumtop`.`productbacklog` WHERE `productbacklog`.`item` = $item and `productbacklog`.`codprojeto` = $cod;
        
                ");



            return $retorno;
        } catch (Exception $e) {


            throw $e;
        }
    }

}

?>
