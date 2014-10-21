<?php

if (!isset($_SESSION))
    session_start();
include_once('AbstractDao.php');

class ProdutoBacklogDAO extends AbstractDao {

    // Construtor
    public function __construct() {
        parent::__construct();
    }

    public function __addProduct($pdesc, $pestimativa, $status, $cod) { # Verifica email e senha
        try {
            $retorno = NULL;
            $this->__executeSQL("
                INSERT INTO `scrumtop`.`productbacklog` (`descricao`, `estimativa`, `status`,`codprojeto`)
                VALUES ('$pdesc', '$pestimativa', '$status',$cod);         
                ");


            if ($this->__returnLinesSQL() > 0) {

                $retorno[0] = $this->__returnSpecificContentSQL(0, "usuario");
                $retorno[1] = $this->__returnSpecificContentSQL(0, "senha");
            }
        } catch (Exception $e) {


            throw $e;
        }
    }

    public function __removeProduct($cod, $item) { # Verifica email e senha
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
    
     public function __RetornaProdutoBacklogTask($codProjeto) { # Verifica email e senha
        try {
            $retorno = NULL;
            $resultado = $this->__executeSQL("
                        select * from productbacklog where codprojeto = '" . $codProjeto . "'
                           
                ");
            $i = 0;
            while ($this->__returnLinesSQL() > $i) {
                $item = $this->__returnSpecificContentSQL($i, 'item');
                $descricao = $this->__returnSpecificContentSQL($i, 'descricao');
               
            
                
                echo  '<div class="buble" >
                                <div class="pb">
                                  
                                   Item PB =' . $item . '
                                   <p>Descrição =' . $descricao . '
                                </div>
                               
                         </div>';

                $i++;
            }
        } catch (Exception $e) {


            throw $e;
        }
    }

    public function __RetornaProdutoBacklog($codProjeto) { # Verifica email e senha
        try {
            $retorno = NULL;
            $resultado = $this->__executeSQL("
                        select * from productbacklog where codprojeto = '" . $codProjeto . "'
                           
                ");
            $i = 0;
            while ($this->__returnLinesSQL() > $i) {
                $item = $this->__returnSpecificContentSQL($i, 'item');
                $descricao = $this->__returnSpecificContentSQL($i, 'descricao');
                $estimativa = $this->__returnSpecificContentSQL($i, 'estimativa');
                $status = $this->__returnSpecificContentSQL($i, 'status');
                echo '<tr>  
                                    <td>' . $item . '</td>
                                  <td> ' . $descricao . ' </td>
                                  <td> ' . $estimativa . '</td>
                                   <td> ' . $status . '</td>

                                  <td>
                           <a href="../Post/EditarBLpost.php?item=' . $item . ' "> <img src="delete.png" width="16" height="16")"/> </a>
                          </td>
                        </tr>';

                $i++;
            }
        } catch (Exception $e) {


            throw $e;
        }
    }

    public function __alterar($valor, $linha, $cod) {
        try {

            $this->__executeSQL("
                    UPDATE `scrumtop`.`productbacklog` SET `pronto` = '$valor' WHERE `productbacklog`.`codprojeto` = $cod and  `productbacklog`.`item` =  $linha ; ");
          
        } catch (Exception $e) {


            throw $e;
        }
    }


    public function __RetornaProdutoPronto($codProjeto) { # Verifica email e senha
        try {
            $retorno = NULL;
            $resultado = $this->__executeSQL("
                        select * from productbacklog where codprojeto = '" . $codProjeto . "'
                           
                ");
            $i = 0;
            while ($this->__returnLinesSQL() > $i) {
                $item = $this->__returnSpecificContentSQL($i, 'item');
                $descricao = $this->__returnSpecificContentSQL($i, 'descricao');
                $estimativa = $this->__returnSpecificContentSQL($i, 'estimativa');
                $status = $this->__returnSpecificContentSQL($i, 'status');
                $pronto = $this->__returnSpecificContentSQL($i, 'pronto');

                echo '<tr>  
                                    <td>' . $item . '</td>
                                  <td> ' . $descricao . ' </td>
                                  <td> ' . $estimativa . '</td>
                                  <td onclick="edit(this)" id=' . $item . '>' . $pronto . '</td>

                                  <td>
                           <a href="../Post/EditarBLpost.php?item=' . $item . ' "> <img src="delete.png" width="16" height="16")"/> </a>
                          </td>
                        </tr>';

                $i++;
            }
        } catch (Exception $e) {


            throw $e;
        }
    }

    public function __RetornaProdutoBacklo($codProjeto) { # Verifica email e senha
        try {
            $retorno = NULL;
            $resultado = $this->__executeSQL("
                        select * from productbacklog where codprojeto = '" . $codProjeto . "'
                           
                ");
            $i = 0;
            while ($this->__returnLinesSQL() > $i) {
                $item = $this->__returnSpecificContentSQL($i, 'item');
                $descricao = $this->__returnSpecificContentSQL($i, 'descricao');
                $estimativa = $this->__returnSpecificContentSQL($i, 'estimativa');
                $status = $this->__returnSpecificContentSQL($i, 'status');
                echo '<tr>  <td> <input type="checkbox" value="' . $item . '" name="marcar[]" /></td>
                         
                                  <td> ' . $descricao . ' </td>
                                  <td> ' . $estimativa . '</td>
                                   <td> ' . $status . '</td>

                                  <td>
                           <a href="../Post/EditarBLpost.php?item=' . $item . ' "> <img src="delete.png" width="16" height="16")"/> </a>
                          </td>
                        </tr>';

                $i++;
            }
            return 0;
        } catch (Exception $e) {


            throw $e;
        }
    }

}

?>
