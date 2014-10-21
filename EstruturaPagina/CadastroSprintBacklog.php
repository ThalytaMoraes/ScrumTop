<?php
include_once '../DAO/ProdutoBacklog.php';
include_once '../DAO/SprintBacklogDao.php';

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
            <title>   Cadastrar Sprint Backlog  </title>
            <link rel="stylesheet" href="../templatemo_style.css" type="text/css">
            <link rel="stylesheet" href="../Estilo-formulario.css" type="text/css">
            <script src="../jquery-1.4.1.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>


        </head>
        <body>


            <div id="templatemo_content_wrapper">

                <form method="POST" action="../Post/SprintBackLog.php" style="margin-top: 80px; margin-left: 400px; text-align: left ;font-size: 18px;">
                    <br>
                    <legend><h3><b>Cadastrar Sprint Backlog</b></h3></legend>  
                    <br> <br>
                    <fieldset style=" margin-left: 40px">
                        <fieldset class="grupo">
                            <div class="campo">
                                <label for="esti"> Estória</label>
                                <input type="text" id="esti" name="esti" style="width: 30em" value="" />
                            </div>

                            <div class="campo">
                                <label>Product Backlog</label> 

                                <select name="status">
                                    <?php
                                    $DAO = new SprintBacklogDAO();
                                    $DAO->__initialize();
                                    echo $DAO->__listaitempb($_SESSION['codigo']);
                                    $DAO->__finalize();
                                    ?>  
                                </select> 
                            </div>
                        </fieldset>


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

