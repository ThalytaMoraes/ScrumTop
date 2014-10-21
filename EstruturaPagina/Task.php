<?php
include_once '../DAO/MembroDAO.php';
include_once '../DAO/SprintBacklogDao.php';
include_once '../DAO/ProdutoBacklog.php';

include "processTask.php";

if (isset($_GET["sair"]))
    if ($_GET['sair'] = 1) {
        if (!isset($_SESSION))
            session_start();
        session_destroy();
    }
if (!isset($_SESSION))
    session_start();

if (!array_key_exists('logado', $_SESSION))
    $_SESSION['logado'] = 'deslogado';


if ($_SESSION['logado'] == 'logado') {
    ?>
    <html>
        <head>

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>   Task Board  </title>
            <link rel="stylesheet" href="../Estilo.css" type="text/css">
            <link rel="stylesheet" href="../Estilo-TaskBoard.css" type="text/css">
            <link rel="stylesheet" href="../templatemo_style.css" type="text/css">
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
            <script src="../jquery-1.4.1.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>
            <link rel="stylesheet" href="custom.css" media="screen" />
            <script language="javascript">
                function ajax() {
                    var xmlhttp;
                    /*@cc_on
                     @if (@_jscript_version >= 5)
                     try {
                     xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                     } catch (e) {
                     try {
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                     } catch (e) {
                     xmlhttp = false;
                     }
                     }
                     @else
                     xmlhttp = false;
                     @end @*/
                    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
                        try {
                            xmlhttp = new XMLHttpRequest();
                        } catch (e) {
                            xmlhttp = false;
                        }
                    }
                    return xmlhttp;
                }
                // -------------------------------------------------------------

                $(document).ready(function() {
                    $("#não-iniciado,#iniciado,#Concluído").sortable({
                        connectWith: '.connectedSortable',
                        receive: function(event, ui) {

                            http = ajax(); //http é um objeto.
                            idtr = $(ui.item).attr('data-id'); // estamos no input, voltamos dois niveis e estamos na TR, como ja sabemos o id da TR é o mesmo id do registro no banco

                            novovalor = $(this).attr('id');//o novo valor é oque foi digitado no campo input
                            parametros = "&id=" + idtr + "&novovalor=" + novovalor;
                            http.open("POST", "updatetask.php", true); //update.php é pagina para onde iremos enviar os parametros, esta pagina será acessada somente pelo ajax e os parametros serao passados via POST
                            http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //cabeçalho necessário para a passagem de parametros via post
                            http.send(parametros); //acessando a pagina e enviando os parametros...

                            http.onreadystatechange = function() { //verificando o andamento da operação
                                if (http.readyState == 4) { //verifica se a operação ja foi concluida
                                    if (http.status == 200) { //verifica se foi tudo ok

                                    } else {
                                        alert('Erro na tentativa de salvar a alteração'); //caso acontecer algum erro mostre este alert
                                    }

                                    http = null;
                                }
                            }

                        }
                    }).disableSelection();

                });
            </script>


        </head>
        <body>

          <ul id="sddm">
                <li><a href="../EstruturaPagina/configuracao"><img src="../images/menu/configuration-icon.png" border="0"  height="20px" /> Configurações</a></li>
                <li><a href="../EstruturaPagina/Recurso.php"><img src="../images/menu/logo.png" border="0" height="20px"/>Recursos</a></li>
                <li><a href="../EstruturaPagina/Cronograma.php"><img src="../images/menu/logo.png" border="0" height="20px"/>Cronograma</a></li>
                <li><a href="../EstruturaPagina/Principal.php"><img src="../images/menu/logo.png" border="0" height="20px"/>Scrum</a></li>
                <li><a href=""><img src="../images/menu/mais.png"  border="0" height="50px"/>Projeto</a></li>

            </ul>

        <div id="templatemo_content_wrapper"style="width: 1861px" >

            <div id="templatmeo_content" style="margin-top: 120px;margin-left: 400px">
                <b style="margin-left: 20px;font-size: 20px;"> <img src="../images/menu/logo.png" border="0" height="20px"> Task Board</b>
                <br>
                <br>
                <br>
                <br>
                <div id="bublecontainers">
                    <div id="donetitle">Product Backlog</div>
                    <div id="bltitle">Não Iniciado</div>
                    <div id="wiptitle">Iniciado</div>
                    <div id="donetitle">Concluído</div>

                    <div  id="pb"> 

                        <?php
                        $DAO = new ProdutoBacklogDAO();
                        $DAO->__initialize();
                        echo $DAO->__RetornaProdutoBacklogTask($_SESSION['codigo']);
                        $DAO->__finalize();
                        ?> 

                    </div>
                    <div id="não-iniciado" class="connectedSortable">
                        <?php
                        $DAO = new SprintBacklogDAO();
                        $DAO->__initialize();
                        echo $DAO->__task('não-iniciado', $_SESSION['codigo']);
                        $DAO->__finalize();
                        ?> 
                    </div>
                    <div id="iniciado" class="connectedSortable">
                        <?php
                        $DAO = new SprintBacklogDAO();
                        $DAO->__initialize();
                        echo $DAO->__task('iniciado', $_SESSION['codigo']);
                        $DAO->__finalize();
                        ?> 
                    </div>
                    <div id="concluído" class="connectedSortable">
                        <?php
                        $DAO = new SprintBacklogDAO();
                        $DAO->__initialize();
                        echo $DAO->__task('concluído', $_SESSION['codigo']);
                        $DAO->__finalize();
                        ?> 
                    </div>
                    <div style="clear:both"></div>
                </div>


                <div id="texto" style="color: red">
                    <?php
                    if (isset($_GET["sair"]))
                        if ($_GET['sair'] = 1) {
                            if (!isset($_SESSION))
                                echo "Voce nao esta logado!";
                        }
                    if (isset($_GET["errorLogin"]))
                        if ($_GET["errorLogin"] == "1") {
                            echo "Voce nao esta logado!";
                        } else if ($_GET["errorLogin"] == "2") {
                            echo "Campo em branco!";
                        }
                    ?>
                </div>


            </div> 

        </div> 

      
    </body>
    </html>
    <?php
} else {
    header("Location: http://localhost/TCC-ScrumTop/index.php?sair");
}
?>