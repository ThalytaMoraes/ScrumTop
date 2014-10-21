<?php
include_once '../DAO/PlanejamentoDAO.php';
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
            <link rel="stylesheet" href="../Estilo-TaskBoard.css" type="text/css">

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
            <script src="../JavaScript/jquery.tablesorter.min.js"></script>
            <script src="../JavaScript/jquery.tablesorter.pager.js"></script>
            <link rel="stylesheet" href="custom.css" media="screen" />

        </head>
        <body>

           <ul id="sddm">
                <li><a href="../EstruturaPagina/configuracao"><img src="../images/menu/configuration-icon.png" border="0"  height="20px" /> Configurações</a></li>
                <li><a href="../EstruturaPagina/Recurso.php"><img src="../images/menu/logo.png" border="0" height="20px"/>Recursos</a></li>
                <li><a href="../EstruturaPagina/Cronograma.php"><img src="../images/menu/logo.png" border="0" height="20px"/>Cronograma</a></li>
                <li><a href="../EstruturaPagina/Principal.php"><img src="../images/menu/logo.png" border="0" height="20px"/>Scrum</a></li>
                <li><a href=""><img src="../images/menu/mais.png"  border="0" height="50px"/>Projeto</a></li>

            </ul>
            <div style="margin-left: 20px;font-size: 20px;margin-top: 150px">
             <b style="margin-left: 20px;font-size: 20px;margin-top: 200px"> <img src="../images/menu/logo.png" border="0" height="20px"> Informações da Reunião de Planejamento</b>
                    
            </div>
            
                       
            <div  style= "margin-top: 120px;" >


                   
                <div style="float: left; width: 740px; height: 765px;">

                    <div align="center"  style=" margin-left: 115px; width: 560px; left: 315px;box-shadow: 3px 10px 19px rgba(0, 0, 0, 0.5);
                         -moz-box-shadow: 3px 10px 19px rgba(0, 0, 0, 0.5);
                         -webkit-box-shadow:3px 10px 19pxrgba(0, 0, 0, 0.5);">
                        <iframe width="560" height="315"  src="//www.youtube.com/embed/tXwix_XeiS8" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <div>
                    <li>
                        <a href= "../EstruturaPagina/SprintBacklog.php" style="  color: #1683a3"> 
                                Inserir Product Backlog 
                            </a>
                        </li>
                    <br> <br> <br>
                    <table cellspacing="0" summary="" style="width: 700px">
                        <thead>

                            <tr>

                                <th>Local</th>
                                <th>Hora</th>
                                <th>Total Membros</th>
                                <th>Observações</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php
                            $DAO = new PlanejamentoDao();
                            $DAO->__initialize();
                            echo $DAO->__RetornaReuniao($_SESSION['codigo'], '1');
                            $DAO->__finalize();
                            ?> 
                        </tbody>
                    </table>

                
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
