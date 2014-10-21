<?php
if (isset($_GET["sair"]))
    if ($_GET['sair'] = 1) {
        if (!isset($_SESSION))
            session_start();
        session_destroy();
    }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>   Login   </title>
        <link rel="stylesheet" href="templatemo_style.css" type="text/css">
        <link rel="stylesheet" href="Estilo-Login.css" type="text/css">

        <script src="jquery-1.4.1.min.js"></script>
        <script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="JavaScript/jquery.fancybox.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="JavaScript/jquery.fancybox.css?v=2.1.5" media="screen" />

        <script type="text/javascript">
            $(document).ready(function() {
                $('.fancybox').fancybox();
            });
        </script>


    </head>
    <body>
        <div id="geral">

            <div id="video">
                <br> <br> <br> <br> <br> <br> <br> <br><br> 
                <div align="center"  style=" margin-left: 115px; width: 560px; left: 315px;box-shadow: 3px 10px 19px rgba(0, 0, 0, 0.5);
                     -moz-box-shadow: 3px 10px 19px rgba(0, 0, 0, 0.5);
                     -webkit-box-shadow:3px 10px 19pxrgba(0, 0, 0, 0.5);">
                    <iframe width="560" height="315"  src="//www.youtube.com/embed/tXwix_XeiS8" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div id="login">
                <p></p>
                <br><br><br><br><br><br><br>


                <form id="formu" method="POST" action="Post/LoginPost.php">
                    <fieldset style="border: none">  
                        <div id="user_div" >
                            <label><h6>Usuário:</h6></label>
                            <input name="Usuario" type="text" size="50" maxlength="50" id="user" onMouseOver="this.focus()" class="cxtext">
                            <br>

                        </div>

                        <div id="pwd_div">
                            <label><h6>Senha:</h6></label>
                            <input name="Senha" type="password" size="50" maxlength="50" id="pwd" class="cxtext">
                            <br>
                        </div>
                        <div id="enter_img_div">
                            <label><p></p></label>
                            <input type="submit" value="   Entrar   "   align="right" style="font-size:16px; font-weight:bold">


                        </div>
                        <br>

                        <div>
                            Não possui uma conta no ScrumTop? <br>
                            <a class="fancybox fancybox.iframe" href="EstruturaPagina/CadastroMembro.php"> Inscreva-se já!  </a>

                        </div>
                    </fieldset>
                </form>

                <div id="texto" style="color: red;margin-left: 110px">
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
                            echo "Campos em branco! Favor verificar.";
                        }
                    ?>
                </div>


            </div> 



            <div id="templatemo_footer">

                <a href="index.php" class="current">Home</a> 

                <div class="cleaner h10"></div>


            </div>
        </div>
    </body>
</html>





