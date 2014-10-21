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
            <title>   Selecionar Projeto  </title>
            <link rel="stylesheet" href="../templatemo_style.css" type="text/css">
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
            <script src="../JavaScript/jquery.tablesorter.min.js"></script>
            <script src="../JavaScript/jquery.tablesorter.pager.js"></script>
            <script type="text/javascript" src="../lib/jquery-1.10.1.min.js"></script>
            <script type="text/javascript" src="../JavaScript/jquery.fancybox.js?v=2.1.5"></script>
            <link rel="stylesheet" type="text/css" href="../JavaScript/jquery.fancybox.css?v=2.1.5" media="screen" />
            <link rel="stylesheet" href="custom.css" media="screen" />

            <script type="text/javascript">
                $(document).ready(function() {
                    $('.fancybox').fancybox();
                });
            </script>

        </head>
        <body>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            <ul id="sddm">

            </ul>

            <div id="templatemo_content_wrapper " style="float: left">


                <div id="templatmeo_content" style="margin-top: 180px;   float:left;">

                    <form method="post" action="exemplo.html" id="frm-filtro" style="margin-left: 200px">
                        <p>
                            <a class="fancybox fancybox.iframe"href="../EstruturaPagina/CadastroProjeto.php"><img src="../images/menu/mais.png"  border="0" height="47px"> </a>
                            <label for="pesquisar">Pesquisar </label>
                            <input type="text" id="pesquisar" name="pesquisar" size="30" />
                        </p>
                    </form>

                    <table cellspacing="0" summary="Tabela" style="margin-left: 200px">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>

                            </tr>
                        </thead>
                        <p>
                            <label for="pesquisar" style="margin-left: 200px">

                                Clique no código do projeto para acessá-lo.                           </label>
                        </p>
                        <tbody>
                            <?php
                            $DAO = new MembroDao();
                            $DAO->__initialize();
                            echo $DAO->__retornaProjetoMembro($_SESSION['usuario']);
                            $DAO->__finalize();
                            ?> </tbody>
                    </table>

                    <div id="pager" class="pager" style="margin-left: 200px">
                        <form>
                            <span>
                                Exibir <select class="pagesize">
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

                    <script>
                        $(function() {

                            $('table > tbody > tr:odd').addClass('odd');

                            $('table > tbody > tr').hover(function() {
                                $(this).toggleClass('hover');
                            });

                            $('#marcar-todos').click(function() {
                                $('table > tbody > tr > td > :checkbox')
                                        .attr('checked', $(this).is(':checked'))
                                        .trigger('change');
                            });

                            $('table > tbody > tr > td > :checkbox').bind('click change', function() {
                                var tr = $(this).parent().parent();
                                if ($(this).is(':checked'))
                                    $(tr).addClass('selected');
                                else
                                    $(tr).removeClass('selected');
                            });

                            $('form').submit(function(e) {
                                e.preventDefault();
                            });

                            $('#pesquisar').keydown(function() {
                                var encontrou = false;
                                var termo = $(this).val().toLowerCase();
                                $('table > tbody > tr').each(function() {
                                    $(this).find('td').each(function() {
                                        if ($(this).text().toLowerCase().indexOf(termo) > -1)
                                            encontrou = true;
                                    });
                                    if (!encontrou)
                                        $(this).hide();
                                    else
                                        $(this).show();
                                    encontrou = false;
                                });
                            });


                        });
                    </script>
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
                <div class="fb-comments" data-href="https://blu178.mail.live.com/?fid=flinbox" data-width="280px"data-numposts="2" data-colorscheme="light"></div>
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

