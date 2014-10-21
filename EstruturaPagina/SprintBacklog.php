<?php
include_once '../DAO/SprintBacklogDao.php';
include_once "process.php";

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
            <title>   Sprint Backlog  </title>
            <link rel="stylesheet" href="../templatemo_style.css" type="text/css">
            <script src="../jquery-1.4.1.min.js"></script>
            <script type="text/javascript" src="../lib/jquery-1.10.1.min.js"></script>
            <script type="text/javascript" src="../JavaScript/jquery.fancybox.js?v=2.1.5"></script>
            <link rel="stylesheet" type="text/css" href="../JavaScript/jquery.fancybox.css?v=2.1.5" media="screen" />
           
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
            <script src="../JavaScript/jquery.tablesorter.min.js"></script>
            <link rel="stylesheet" href="custom.css" media="screen" />

            <script type="text/javascript" src="../lib/jquery-1.10.1.min.js"></script>
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
                <li><a href=""><img src="../images/menu/mais.png"  border="0" height="50px"/>Novo</a></li>

            </ul>
            <div id="templatemo_content_wrapper" style="width: 1385px;margin-top: 150px">
                <b style="margin-left: 20px;font-size: 20px;"> <img src="../images/menu/logo.png" border="0" height="20px"> Sprint Backlog</b>
                <br>
                <br>
                <br>
                <br>
                <div style="margin-top: 35px;width: 1100px ;">
                    <form method="post"  action=""  style="width: 1100px ;">

                        <table cellspacing="0"  style="width: 1100px ;">
                            <thead>
                                <tr style=""><a class="fancybox fancybox.iframe"href="../EstruturaPagina/CadastroSprintBacklog.php"><img src="../images/menu/mais.png"  border="0" height="47px"> </a> 
                                <a  class="fancybox fancybox.iframe" href= "../EstruturaPagina/Grafico.php" style="  color: #1683a3"> 
                                    Visualizar Gráfico 
                                </a>
                          
                            </tr>  
                            <tr>
                                <th>Item Backlog</th>
                                <th>Estória</th>
                                <th>Dia 1 </th>
                                <th>Dia 2</th>
                                <th>Dia 3</th>
                                <th>Dia 4</th>
                                <th>Dia 5</th>
                                <th>Dia 6</th>
                                <th>Dia 7</th>
                                <th>Dia 8</th>
                                <th>Dia 9</th>
                                <th>Dia 10</th>
                                <th>Dia 11</th>
                                <th>Dia 12</th>
                                <th>Dia 13</th>
                                <th>Dia 14</th>
                                <th>Dia 15</th>


                                <th>Ações</th>
                            </tr>

                            </thead>
                            <tbody>
                                <?php
                                $DAO = new SprintBacklogDAO();
                                $DAO->__initialize();
                                echo $DAO->__RetornaSprintBacklog($_SESSION['codigo']);
                                $DAO->__finalize();
                                ?> 
                            </tbody>
                        </table>
                    </form>
                    <div id="pager" class="pager" style="width: 1050px">
                        <form style="width: 1080px">
                            <span >
                                Exibir <select class="pagesize" >
                                    <option selected="selected"  value="10">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option  value="40">40</option>
                                </select> registros
                            </span>

                            <img src="first.png" class="first"/>
                            <img src="prev.png" class="prev"/>
                            <input type="text" class="pagedisplay"/>
                            <img src="next.png" class="next"/>
                            <img src="last.png" class="last"/>
                        </form>
                    </div>

                </div>
                <br><br> <br><br>
              
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