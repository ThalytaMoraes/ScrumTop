<?php

if(!isset($_SESSION))session_start();
include_once('AbstractDao.php');


class AlunoDao extends AbstractDao{
    public function __construct(){ 
		parent::__construct();
	}
  public function __cadastroAlunoSimples($pnome, $scrummaster, $data, $proi, $info){ # Verifica email e senha
      
     try{
             
                $this->__executeSQL("          
                      INSERT INTO `scrumtop`.`projeto` (`nome`, `scummaster`, `datainicio`, `productOwner`, `informaçoes`) VALUES ('$pnome', '$scrummaster', '$data', '$proi', '$info');
                ");
                
                
           

        }catch(Exception $e){
                throw $e;
        }
    }	  
    
    public function __retornaAlunos(){ # Verifica email e senha
     try{
                $retorno = NULL;	
                $resultado = $this->__executeSQL("
                        select * from Aluno
                           
                ");
                $i = 0;
                while($this->__returnLinesSQL() > $i){
                        $matricula = $this->__returnSpecificContentSQL($i, 'matriculaAluno');
                        $nome = $this->__returnSpecificContentSQL($i,'nome');
                        echo "<tr><td>" . '<input type="checkbox"  name="alunos[]" value="' . $matricula .'">'. $matricula. "</td><td>" . $nome . "</td></tr>";
                        $i++;
                }
                $this->__freeMemory();
               

        }catch(Exception $e){
                throw $e;
        }
    }	
    
    
}
