<?php
include_once '../DAO/ReuniRetroDAO.php';

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
            <title>   Reunião de retrospectiva  </title>
            <link rel="stylesheet" href="../templatemo_style.css" type="text/css">
            <link rel="stylesheet" href="../Estilo-formulario.css" type="text/css">
            <link rel="stylesheet" href="../Estilo.css" type="text/css">
            <script src="../jquery-1.4.1.min.js"></script>
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

            <div id="templatemo_content_wrapper" style=" width:1394px ;margin-top: 10%">
                <b style="margin-left: 20px;font-size: 20px;"> <img src="../images/menu/logo.png" border="0" height="20px"> Reunião de Retrospectiva</b>
                <br>
                <br>
                <br>
                <br>
                <div style="float:left; border-radius: 10px;background: #f2f2f2;"> 
                    <br> <br>
                    <b style="margin-left: 20px;font-size: 20px;"> <img src="../images/menu/logo.png" border="0" height="20px"> Pontos Positivos</b>

                    <?php
                    $DAO = new ReuniRetroDAO();
                    $DAO->__initialize();
                    echo $DAO->__RetornaPontosPositivos($_SESSION['codigo'], 1);
                    $DAO->__finalize();
                    ?>
                    <form method="POST" action="../Post/ReuniRetroPost.php"> 

                        <fieldset>
                            <legend> <h4><b> Adicionar Pontos Positivos </b></h4></legend>
                            <p></p>

                            <label><h6>TÍtulo:</h6></label>
                            <input name="tituloP" type="text" size="50" maxlength="50" id="titulo">
                            <label><h6>Descrição:</h6></label>
                            <textarea id="DescricaoP" name="DescricaoP" rows="7" cols="36"></textarea>


                            <p> </p>
                            <input type="submit" class="submit_btn" name="submit" id="submit" style="font-size:14px" value="Postar" />


                        </fieldset> 
                    </form>          
                </div>
                <div style="float:left; border-radius: 10px;background: #f2f2f2;fon"> 
                    <br> <br>
                    <b style="margin-left: 20px;font-size: 20px;"> <img src="../images/menu/logo.png" border="0" height="20px"> Pontos Negativos</b>

                    <form method="POST" action="../Post/ReuniRetroPostNegativo.php"> 

                        <?php
                        $DAO = new ReuniRetroDAO();
                        $DAO->__initialize();
                        echo $DAO->__RetornaPontosNegativos($_SESSION['codigo'], 1);
                        $DAO->__finalize();
                        ?>
                        <fieldset>
                            <legend> <h4><b> Adicionar Pontos Negativos </b></h4></legend>
                            <p></p>

                            <label><h6>Título:</h6></label>
                            <input name="tituloN" type="text" size="50" maxlength="50" id="titulo">
                            <label><h6>Descrição:</h6></label>
                            <textarea id="DescricaoN" name="DescricaoN" rows="7" cols="36"></textarea>



                            <p> </p>
                            <input type="submit" class="submit_btn" name="submit" id="submit" style="font-size:14px" value="Postar" />


                        </fieldset> 
                    </form>    



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

