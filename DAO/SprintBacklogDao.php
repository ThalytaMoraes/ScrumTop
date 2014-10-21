<?php

if (!isset($_SESSION))
    session_start();
include_once('AbstractDao.php');

class SprintBacklogDAO extends AbstractDao {

    // Construtor
    public function __construct() {
        parent::__construct();
    }

    public function update($coluna,$item, $cod) {
        $this->__executeSQL("
                   SUPDATE `scrumtop`.`productbacklog` SET `pronto` = '$coluna' 

                       WHERE `productbacklog`.`item` = '$item' and `codprojeto` = '$cod'; ");
    }
     public function __inserir($es,$codpb,$codp) {
        $this->__executeSQL(" INSERT INTO `scrumtop`.`sprint backlog` 
            ( `Estorias`, `1`, `cod_Pj`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `cod_pb`, `status`) 
            VALUES ( '$es', '0', '$codp', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '$codpb', '0');
    ; ");
    }
   
      public function __listaitempb($codp) {
        $this->__executeSQL("
                   SELECT `item` FROM `productbacklog` WHERE `codprojeto` = '$codp'; ");
       
           $i = 0;
            while ($this->__returnLinesSQL() > $i) {
                $item = $this->__returnSpecificContentSQL($i, 'item');
             

                echo '  <option>  '. $item .' </option>';

                $i++;
            }
       
                               
      }

     public function __alterar($valor, $linha, $cod) {
        try {

            $this->__executeSQL("
                    UPDATE `scrumtop`.`sprint backlog` SET `status` = '$valor' WHERE `sprint backlog`.`cod` = $cod ; ");
          
        } catch (Exception $e) {


            throw $e;
        }
    }
    public function __task($coluna, $cod) {
        try {

            $this->__executeSQL("
                   SELECT * FROM `sprint backlog` 
                       inner join `productbacklog` on `sprint backlog`.cod_pb = `productbacklog`.item
                       
                       WHERE `pronto` = '$coluna' and `codprojeto` = '$cod'; ");

            $i = 0;
            while ($this->__returnLinesSQL() > $i) {
                $item = $this->__returnSpecificContentSQL($i, 'item');
                $descricao = $this->__returnSpecificContentSQL($i, 'Estorias');

                echo '<div class="buble" data-id="' . $item . '">
                                <div class="buble-content">
                                  
                                   Item PB = ' . $item . '
                                   <p>Estoria = ' . $descricao . '
                                </div>
                                <div class="buble-arrow"></div>
                         </div>';

                $i++;
            }
        } catch (Exception $e) {


            throw $e;
        }
    }

    public function __addSprint($pdesc, $pestimativa, $status, $cod) { # Verifica email e senha
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

    public function __alterarES($coluna, $valor, $linha, $cod) {
        try {

            $this->__executeSQL("
                    UPDATE `scrumtop`.`sprint backlog` SET `$coluna` = '$valor' WHERE `sprint backlog`.`cod` = $linha and  `sprint backlog`.`cod_pj` =  $cod ; ");
        } catch (Exception $e) {


            throw $e;
        }
    }

    public function __RetornaSprintBacklog($codProjeto) { # Verifica email e senha
        try {
            $retorno = NULL;
            $resultado = $this->__executeSQL("
                        select * from `sprint backlog` where cod_Pj = '" . $codProjeto . "'
                           
                ");
            $i = 0;
            while ($this->__returnLinesSQL() > $i) {
                $item = $this->__returnSpecificContentSQL($i, 'cod_Pj');
                $sb = $this->__returnSpecificContentSQL($i, 'cod');
                $estoria = $this->__returnSpecificContentSQL($i, 'Estorias');
                $um = $this->__returnSpecificContentSQL($i, '1');
                $dois = $this->__returnSpecificContentSQL($i, '2');
                $tres = $this->__returnSpecificContentSQL($i, '3');
                $quatro = $this->__returnSpecificContentSQL($i, '4');
                $cinco = $this->__returnSpecificContentSQL($i, '5');
                $seis = $this->__returnSpecificContentSQL($i, '6');
                $sete = $this->__returnSpecificContentSQL($i, '7');
                $oito = $this->__returnSpecificContentSQL($i, '8');
                $nove = $this->__returnSpecificContentSQL($i, '9');
                $dez = $this->__returnSpecificContentSQL($i, '10');
                $once = $this->__returnSpecificContentSQL($i, '11');
                $doze = $this->__returnSpecificContentSQL($i, '12');
                $treze = $this->__returnSpecificContentSQL($i, '13');
                $quatroze = $this->__returnSpecificContentSQL($i, '14');
                $quinze = $this->__returnSpecificContentSQL($i, '15');

                echo '<tr id=' . $sb . '>  
                                   <td >' . $item . '</td>
                                   <td> ' . $estoria . ' </td>
                                   <td onclick="edit(this)" id=1 > ' . $um . '</td>
                                   <td onclick="edit(this)" id=2 > ' . $dois . '</td>
                                   <td onclick="edit(this)"  id=3> ' . $tres . '</td>
                                   <td onclick="edit(this)"  id=4> ' . $quatro . '</td>          
                                   <td onclick="edit(this)"  id=5> ' . $cinco . '</td>
                                   <td onclick="edit(this)" id=6> ' . $seis . '</td>
                                   <td onclick="edit(this)" id=7> ' . $sete . '</td>
                                   <td onclick="edit(this)" id=8> ' . $oito . '</td>
                                   <td onclick="edit(this)" id=9 >' . $nove . '</td>
                                   <td onclick="edit(this)" id=10 >' . $dez . '</td>
                                   <td onclick="edit(this)" id=11 >' . $once . '</td>
                                   <td onclick="edit(this)" id=12 >' . $doze . '</td>
                                   <td onclick="edit(this)" id=13 >' . $treze . '</td>
                                   <td onclick="edit(this)" id=14 >' . $quatroze . '</td>
                                   <td onclick="edit(this)" id=15 >' . $quinze . '</td>
                                                                  
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

    public function __grafico($cod) {


        try {

            $this->__executeSQL("
                    select sum(x.1),sum(x.2),sum(x.3),sum(x.4),sum(x.5),sum(x.6),sum(x.7),sum(x.8),sum(x.9),sum(x.10),sum(x.11)
                    ,sum(x.12),sum(x.13),sum(x.14),sum(x.15) 
                    
                    from `sprint backlog`as x
                    WHERE x.`cod_pj` = $cod ; ");

            $i = 0;
            while ($this->__returnLinesSQL() > $i) {


                $um = $this->__returnSpecificContentSQL($i, 'sum(x.1)');
                $dois = $this->__returnSpecificContentSQL($i, 'sum(x.2)');
                $tres = $this->__returnSpecificContentSQL($i, 'sum(x.3)');
                $quatro = $this->__returnSpecificContentSQL($i, 'sum(x.4)');
                $cinco = $this->__returnSpecificContentSQL($i, 'sum(x.5)');
                $seis = $this->__returnSpecificContentSQL($i, 'sum(x.6)');
                $sete = $this->__returnSpecificContentSQL($i, 'sum(x.7)');
                $oito = $this->__returnSpecificContentSQL($i, 'sum(x.8)');
                $nove = $this->__returnSpecificContentSQL($i, 'sum(x.9)');
                $dez = $this->__returnSpecificContentSQL($i, 'sum(x.10)');
                $once = $this->__returnSpecificContentSQL($i, 'sum(x.11)');
                $doze = $this->__returnSpecificContentSQL($i, 'sum(x.12)');
                $treze = $this->__returnSpecificContentSQL($i, 'sum(x.13)');
                $quatroze = $this->__returnSpecificContentSQL($i, 'sum(x.14)');
                $quinze = $this->__returnSpecificContentSQL($i, 'sum(x.15)');


                $resultado = join(",", array($um, $dois, $tres, $quatro, $cinco, $seis, $sete, $oito, $nove, $dez, $once, $doze, $treze, $quatroze, $quinze));
                $resultado = "[$resultado]";

                echo '<script>   
                                   var resultado =  ' . $resultado . ';
                                   var um =  ' . $um . ';
                                   var dois = ' . $dois . ';
                                   var tres = ' . $tres . ';
                                   var quatro = ' . $quatro . ';         
                                   var cinco = ' . $cinco . ';
                                   var seis = ' . $seis . ';
                                   var sete = ' . $sete . ';
                                   var oito = ' . $oito . ';
                                   var nove = ' . $nove . ';
                                   var dez = ' . $dez . ';
                                   var once = ' . $once . ';
                                   var doze = ' . $doze . ';
                                   var treze = ' . $treze . ';
                                   var quatroze = ' . $quatroze . ';
                                   var quinze = ' . $quinze . ';
                                                                  
                             </script> ';



                $i++;
            }
        } catch (Exception $e) {



            throw $e;
        }
    }

}
