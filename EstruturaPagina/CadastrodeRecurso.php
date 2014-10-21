<?php
include_once '../DAO/GerenciamentoCustoDAO.php';

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
            <title>   Cadastro de Recurso  </title>
            <link rel="stylesheet" href="../templatemo_style.css" type="text/css">
            <link rel="stylesheet" href="../Estilo-formulario.css" type="text/css">
            <script src="../jquery-1.4.1.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
            <script src="jquery.tablesorter.min.js"></script>
            <script src="jquery.tablesorter.pager.js"></script>

        </head>
        <body>


            <div id="templatemo_content_wrapper ">

                <form method="POST" action="../Post/RecursoPost.php" style="margin-top: 80px; margin-left: 36px; text-align: left ;">

                    <fieldset style=" margin-left: 20%">
                        <br>
                        <legend><h3><b>Cadastrar Recurso</b></h3></legend>       

                        <br> <br>
                        <fieldset class="grupo">
                            <div class="campo">
                                <label for="nome"> Nome</label>
                                <input type="text" id="esti" name="nome" style="width: 10em" value="" />
                            </div>
                            <div class="campo">
                                <label for="esti"> Valor</label>
                                <input type="text" id="valor" name="valor" style="width: 10em" value="" />
                            </div>

                        </fieldset>
                        <div class="campo">
                            <label>Tipo </label> 

                            <select name="tipo">
                                <option> Recurso Humano  </option> 
                                <option> Recurso Material  </option> 
                                <option> Recurso Externo  </option> 
                            </select> 
                        </div>
                        <div class="campo">
                            <label for="desc"> Descrição</label>
                            <textarea rows="6" style="width: 20em" id="mensagem" name="desc"></textarea>
                        </div>

                        <div style="margin-left: 541px">    
                            <button type="submit" name="submit" style=" ;background:#006699;color:#ffffff; text-align: right">Enviar</button>
                        </div>
                    </fieldset>
                </form>

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

            <div id="templatemo_footer">

                <a href="../EstruturaPagina/index.php" class="current">Home</a> 

                <div class="cleaner h10"></div>



            </div>
        </body>
    </html>


    <?php
} else {
    header("Location: http://g2.jeiks.net/Portal_DSW/index.php?sair");
}
?>

