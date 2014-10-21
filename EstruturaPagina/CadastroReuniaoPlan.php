<?php
include_once '../DAO/ProdutoBacklog.php';
include_once '../DAO/MembroDAO.php';

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
            <title>   Reunião de planejamento  </title>
            <link rel="stylesheet" href="../templatemo_style.css" type="text/css">
            <script src="../jquery-1.4.1.min.js"></script>
            <link rel="stylesheet" href="../Estilo-formulario.css" type="text/css">

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
            <script src="../JavaScript/jquery.tablesorter.min.js"></script>
            <script src="../JavaScript/jquery.tablesorter.pager.js"></script>
          
        </head>
        <body>

          

            <form method="post" action="../Post/PlanejamentoPost.php" id="frm-filtro" style="margin-top:10%">
                   <legend><h3>Cadastrar Reunião de Planejamento</h3></legend>         
                <fieldset class="grupo">

                        <div class="campo">
                            <label for="local">Local das Reuniões Diárias: </label> 
                            <input type="text" id="local" name="local" style="width: 20em" value="" />

                        </div>
                        <div class="campo">
                            <label for="hora">Horário das Reuniões:</label>
                            <input type="text" id="hora" name="hora" style="width: 7em" value="" />
                        </div>

                    </fieldset>
                    <fieldset class="grupo">
                        <div class="campo">
                            <label for="qaunt">Quantidade de Membros por Sprint:</label>
                            <input type="text" id="qaunt" name="qaunt" style="width: 5em" value="" />
                        </div>

                    </fieldset>

                    <div class="campo">
                        <label for="obj">Objetivo da Sprint: </label>
                        <textarea rows="6" style="width: 28em" id="obj" name="obj"></textarea>
                    </div>
                     <div style="margin-left: 541px">    
                        <button type="submit" name="submit" style=" ;background:#006699;color:#ffffff; text-align: right">Enviar</button>
                        </div>
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

