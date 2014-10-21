<?php

if (!isset($_SESSION))
    session_start();
include_once('AbstractDao.php');

class PlanejamentoDao extends AbstractDao {

    public function __construct() {
        parent::__construct();
    }

    public function __cadastroSimples($cod, $local, $hora, $quanr, $codpla, $codsp,$ob) {
        try {

            $this->__executeSQL("      
             INSERT INTO `scrumtop`.`reuniao_planejameto` (`cod`, `local_RD`, `hora_RD`, `quant_Mem`, `codplaneja`, `codSP`, `ob`)
             VALUES ('$cod', '$local', '$hora', '$quanr', '$codpla', '$codsp', '$ob');
 ");


         
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function __RetornaReuniao($cod, $codsp) {
        try {

            $this->__executeSQL("
                      SELECT * FROM `reuniao_planejameto` WHERE `cod` = $cod and  `codSP` = $codsp
                           
                ;");

            $i = 0;
            while ($this->__returnLinesSQL() > $i) {

                $local_RD = $this->__returnSpecificContentSQL($i, 'local_RD');
                $hora_RD = $this->__returnSpecificContentSQL($i, 'hora_RD');
                $quant_Mem = $this->__returnSpecificContentSQL($i, 'quant_Mem');
                $ob = $this->__returnSpecificContentSQL($i, 'ob');
                $codplaneja = $this->__returnSpecificContentSQL($i, 'codplaneja');

                echo '<tr>  
                                 
                                  <td> ' . $local_RD . ' </td>
                                  <td> ' . $hora_RD . '</td>
                                  <td> ' . $quant_Mem . '</td>
                                  <td> ' . $ob . '</td>
                               
                      </tr>';

                $i++;
            }
        } catch (Exception $e) {


            throw $e;
        }
    }

}
