<?php
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
            <title>   Menu Sprint  </title>
            <link rel="stylesheet" href="../templatemo_style.css" type="text/css">
            <link rel="stylesheet" href="../Estilo-TaskBoard.css" type="text/css">

            <script src="../jquery-1.4.1.min.js"></script>


            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
            <script src="../JavaScript/jquery.tablesorter.min.js"></script>
            <script src="../JavaScript/jquery.tablesorter.pager.js"></script>
            <script type="text/javascript" src="../lib/jquery-1.10.1.min.js"></script>

            <link rel="stylesheet" href="custom.css" media="screen" />
            <script type="text/javascript" src="../JavaScript/jquery.fancybox.js?v=2.1.5"></script>
            <link rel="stylesheet" type="text/css" href="../JavaScript/jquery.fancybox.css?v=2.1.5" media="screen" />
            <script type="text/javascript">
                $(document).ready(function() {
                    $('.fancybox').fancybox();
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

            <div id="templatemo_content_wrapper" style=" float:left;">

                <div id="templatmeo_content" style="margin-top: 180px; float:left;">


                    <b style="margin-left: 20px;font-size: 20px;"> <img src="../images/menu/logo.png" border="0" height="20px"> Menu Sprint do ScrumTop</b>
                    <br>
                    <br>
                    <br>
                    <br>
                    <ul class="board-list gutter js-board-list clearfix">

                        <?php
                        $DAO = new MembroDao();
                        $DAO->__initialize();
                        echo $DAO->__RetornaReuniao($_SESSION['codigo']);
                        $DAO->__finalize();
                        ?>

                        <li>
                            <a href= "../EstruturaPagina/ReuniRetro.php" style="  background-color: #1683a3"> 

                                Reunião de Retropectiva 
                            </a>
                        </li>
                        <li>
                            <a href= "../EstruturaPagina/ReuniRevisao.php" style="  background-color: #1683a3"> 

                                Reunião de Revisão 
                            </a>
                        </li>
                        <li>
                            <a href= "../EstruturaPagina/Task.php" style="  background-color: #1683a3"> 
                                Task Board

                            </a>
                        </li>
                        <li>
                            <a class="fancybox fancybox.iframe" href= "../EstruturaPagina/Grafico.php" style="  background-color: #1683a3"> 
                                Burndown

                            </a>
                        </li>
                        <li>
                            <a href= "../EstruturaPagina/SprintBacklog.php" style="  background-color: #1683a3"> 
                                Sprint Backlog

                            </a>
                        </li>


                    </ul>


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
            <div style="background: #f6f6f6; height: 646px; width: 292px; margin-left: 1205; margin-top: 20px; " >
                <script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
                <div id="SkypeButton_Call_thalyta.moraes1_1" style=" margin-top: 20pxz">
                    <script type="text/javascript">
                Skype.ui({
                    "name": "dropdown",
                    "element": "SkypeButton_Call_thalyta.moraes1_1",
                    "participants": ["thalyta.moraes1", "ekeje"],
                    "imageSize": 32
                });
                    </script>
                </div>
                <br> <br> <br> <br><br>
            </div>
            <div id="templatemo_footer">

                <a href="../EstruturaPagina/index.php" class="current">Home</a> 

                <div class="cleaner h10"></div>



            </div>
        </body>


        <?php
    } else {
        header("Location: http://localhost/TCC-ScrumTop/index.php?sair");
    }
    ?>





