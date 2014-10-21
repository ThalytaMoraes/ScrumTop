<?php

if (!isset($_SESSION))
    session_start();
include_once('AbstractDao.php');

class MembroDao extends AbstractDao {

    public function __construct() {
        parent::__construct();
    }

    public function __RetornaReuniao($cod) {
        try {

            $this->__executeSQL("   select count(cod) from  `reuniao_planejameto` where cod = '  $cod  '");
            $i = 0;
            while ($this->__returnLinesSQL() > $i) {
                $cod = $this->__returnSpecificContentSQL($i, 'count(cod)');
                if ($cod == 0) {
                    echo' 
                         <li>
                         <a class="fancybox fancybox.iframe" href= "../EstruturaPagina/CadastroReuniaoPlan.php" style="  background-color: #1683a3"> 
                            Reunião de Planejamento                        
                        </a> 
                        </li>';
                } else {

                    echo'<li>
                            <a href= "../EstruturaPagina/Reuniaodeplanejameto.php" style="  background-color: #1683a3"> 


                                Reunião de Planejamento

                            </a>
                        </li>';
                }
                $i++;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function __cadastroMembroSimples($nome, $snome, $mail, $senha, $instituto, $telefone,$skype) {
        try {

            $this->__executeSQL("                        
                     INSERT INTO `scrumtop`.`membro` (`nome`, `senha`, `e-mail`, `telefone`, `instituto`,`snome`,`skype`) VALUES (' $nome', '$senha', '$mail', '$telefone', '$instituto','$snome','$skype'); ");

            $this->__executeSQL("
                       INSERT INTO `scrumtop`.`login` (`usuario`, `senha`) VALUES ('$mail', '$senha');        
                ");



        } catch (Exception $e) {
            throw $e;
        }
    }

    public function __retornaMembros($pinstituto) {
        try {
            $retorno = NULL;
            $resultado = $this->__executeSQL("
                        select * from membro where instituto = '" . $pinstituto . "'
                           
                ");
            $i = 0;
            while ($this->__returnLinesSQL() > $i) {
                $id = $this->__returnSpecificContentSQL($i, 'e-mail');
                $nome = $this->__returnSpecificContentSQL($i, 'nome');
                $instituto = $this->__returnSpecificContentSQL($i, 'instituto');
                echo '<tr>  <td> <input type="checkbox" value="' . $id . '" name="marcar[]" /></td>
			<td>' . $id . '</td>
          <td> ' . $nome . ' </td>
          <td> ' . $instituto . '</td>
         
          <td>
            <a href="#"><img src="edit.png" width="16" height="16" /></a>
            <a href="#"><img src="delete.png" width="16" height="16" /></a>
          </td>
        </tr>';

                $i++;
            }
            return $retorno;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function __retornaSprints($cod) {
        try {


            $retorno = NULL;
            $this->__executeSQL("
                        select NumSprints from projeto where cod = '  $cod  '
                           
                ");


            if ($this->__returnLinesSQL() > 0) {
                $retorno[0] = $this->__returnSpecificContentSQL(0, "NumSprints");
            }

            $j = 1;

            echo ' <li>
                            <a href= "../EstruturaPagina/ProdutoBacklog.php" style="  background-color: #' . rand(0, 9) . 'A' . rand(0, 9) . rand(0, 9) . rand(0, 9) . 'E; ">
                                <span> 
                                    <span class="board-list" title="Geral"> Product Backlog</span> 

                                </span> 
                            </a>
                        </li>
                ';
            while ($retorno[0] >= $j) {
                $x = $j;
                echo ' <li>
                            <a href= "../EstruturaPagina/MenuSprint.php" style="  background-color: #' . rand(0, 9) . 'A' . rand(0, 9) . rand(0, 9) . rand(0, 9) . 'E; ">
                                <span> 
                                    <span class="board-list" title="Geral">Sprint-' . $x . '</span> 

                                </span> 
                            </a>
                        </li>
                ';
                $j++;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function __retornaProjetoMembro($email) {

        try {

            $retorno = NULL;
            $this->__executeSQL("
                        select projeto.cod, projeto.nome from projeto inner join projetomembro on projetomembro.cod = projeto.cod where projetomembro.email = '" . $email . "'
                           
                ");


            $i = 0;
            while ($this->__returnLinesSQL() > $i) {

                $retorno = TRUE;
                $cod = $this->__returnSpecificContentSQL($i, 'cod');

                $nome = $this->__returnSpecificContentSQL($i, 'nome');
                $_SESSION['codigo'] = $cod;
                echo '<td> <a href="../EstruturaPagina/Principal.php" class="current">' . $cod . ' </td>

                        <td>' . $nome . '</td>
        
             </tr>';

                $i++;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

}
