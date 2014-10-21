<?php

if (!isset($_SESSION))
    session_start();
include_once('AbstractDao.php');

class ReuniRetroDAO extends AbstractDao {

    // Construtor
    public function __construct() {
        parent::__construct();
    }

    public function __addPontosPositivo($codpj, $codsprin, $ptitulo, $pdescrição) { # Verifica email e senha
        try {
            $retorno = NULL;
            $this->__executeSQL("
                INSERT INTO `scrumtop`.`pontospositivos` (`cod_SP`, `cod_Pj`, `titulo`, `descricao`) 
                VALUES ('$codpj', '$codsprin', '$ptitulo', '$pdescrição');
                ");
            if ($this->__returnLinesSQL() > 0) {

                $retorno[0] = $this->__returnSpecificContentSQL(0, "cod_SP");
                $retorno[1] = $this->__returnSpecificContentSQL(0, "cod_Pj");
                $retorno[2] = $this->__returnSpecificContentSQL(0, "titulo");
                $retorno[3] = $this->__returnSpecificContentSQL(0, "descricao");
            }
            return $retorno;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function __addPontosNegativos($codpj, $codsprin, $ptitulo, $pdescrição, $pMelhorias) { # Verifica email e senha
        try {
            $retorno = NULL;
            $this->__executeSQL("
                INSERT INTO `scrumtop`.`pontosnegativos` (`cod_SP`, `cod_Pj`, `titulo`, `descricao`, `melhorias`) 
                VALUES ('$codpj', '$codsprin', '$ptitulo', '$pdescrição','$pMelhorias');
              
                ");

            if ($this->__returnLinesSQL() > 0) {

                $retorno[0] = $this->__returnSpecificContentSQL(0, "cod_SP");
                $retorno[1] = $this->__returnSpecificContentSQL(0, "cod_Pj");
                $retorno[2] = $this->__returnSpecificContentSQL(0, "titulo");
                $retorno[3] = $this->__returnSpecificContentSQL(0, "descricao");
                $retorno[4] = $this->__returnSpecificContentSQL(0, "melhorias");
            }
            return $retorno;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function __RetornaPontosPositivos($codProjeto, $codSprint) { # Verifica email e senha
        try {

            $this->__executeSQL(" select * from `scrumtop`.`pontospositivos` where cod_Pj = '" . $codProjeto . "' and cod_SP ='" . $codSprint . "';
                           
                ");
            $i = 0;
            while ($this->__returnLinesSQL() > $i) {

                $titulo = $this->__returnSpecificContentSQL(0, "titulo");
                $descricao = $this->__returnSpecificContentSQL(0, "descricao");
                echo ' <br> <br> <div class = "buble" >
                <div class = "buble-content">'
                . 'Usuário : ' . $_SESSION['usuario'] . ' <br> '
                . 'Titulo : ' . $titulo . '<br>'
                . 'Descrição : ' . $descricao . '<br>
                </div>
                <div class = "buble-arrow"></div>
                </div>  <br>'


                ;
               

                $i++;
            }
           
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function __RetornaPontosNegativos($codProjeto, $codSprint) { # Verifica email e senha
        try {

           
             $this->__executeSQL(" select * from `scrumtop`.`pontosnegativos` where cod_Pj = '" . $codProjeto . "' and cod_SP ='" . $codSprint . "';
                           
                ");
            $i = 0;
            while ($this->__returnLinesSQL() > $i) {
                $titulo = $this->__returnSpecificContentSQL(0, "titulo");
                $descricao = $this->__returnSpecificContentSQL(0, "descricao");
                

                echo ' <br>  <div class = "buble" >
                <div class = "buble-content">'
                . 'Usuário : ' . $_SESSION['usuario'] . ' <br> '
                . 'Titulo : ' . $titulo . '<br>'
                . 'Descrição : ' . $descricao . '<br>
                </div>
                <div class = "buble-arrow"></div>
                </div> <br>'
                    

                ;

                $i++;
            }
        
        } catch (Exception $e) {
            throw $e;
        }
    }

}
