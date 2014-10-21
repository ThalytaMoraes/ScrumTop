<?php
include_once '../DAO/GerenciamentoCustoDAO.php';

function geraGrafico($largura, $altura, $valores, $referencias, $tipo = "p3") {
    $valores = implode(',', $valores);
    $referencias = implode('|', $referencias);


    return "http://chart.apis.google.com/chart?chs=" . $largura . "x" . $altura . "&amp;chd=t:" . $valores . "&chdl=Recurso-Humano|Recurso-Externo|Recurso-Material &amp;cht=p3&amp;chl=" . $referencias . "&chco=1da3f8";
}

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
            <title>   Recursos  </title>
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

            <ul id="sddm">
                <li><a href="../EstruturaPagina/configuracao"><img src="../images/menu/configuration-icon.png" border="0"  height="20px" /> Configurações</a></li>
                <li><a href="../EstruturaPagina/Recurso.php"><img src="../images/menu/logo.png" border="0" height="20px"/>Recursos</a></li>
                <li><a href="../EstruturaPagina/Cronograma.php"><img src="../images/menu/logo.png" border="0" height="20px"/>Cronograma</a></li>
                <li><a href="../EstruturaPagina/Principal.php"><img src="../images/menu/logo.png" border="0" height="20px"/>Scrum</a></li>
                <li><a href=""><img src="../images/menu/mais.png"  border="0" height="50px"/>Projeto</a></li>

            </ul>



            <div id="templatemo_content_wrapper" style="width: 1422px; margin-top: 190px">
                <b style="margin-left: 120px;font-size: 20px;"> <img src="../images/menu/logo.png" border="0" height="20px"> Gerenciamento de Recursos</b>
                <br>

                <p></p>
                <div style="float: left">
                    <form method="post" action="exemplo.html" id="frm-filtro" style="width: 750px">
                        <p style="width: 750px">
                            <label for="pesquisar">Pesquisar</label>
                            <input type="text" id="pesquisar" name="pesquisar" size="30" />
                        </p>
                    </form>

                    <table cellspacing="0" summary="" style="width: 750px">
                        <thead>

                            <tr><a class="fancybox fancybox.iframe"href="../EstruturaPagina/CadastrodeRecurso.php"><img src="../images/menu/mais.png"  border="0" height="47px"> </a> </tr>
                        <tr>
                            <th>Item</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Tipo</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>

                        </thead>
                        <tbody>
                            <?php
                            $DAO = new RecursoDao();
                            $DAO->__initialize();
                            echo $DAO->__Retornarecursos($_SESSION['codigo']);
                            $DAO->__finalize();
                            ?> 
                        </tbody>
                    </table>

                    <div id="pager" class="pager" style="width: 750px">
                        <form style="width: 750px">
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
                <div style="margin-left: 55%;margin-top: 120px">
                    <?php
                    $DAO = new RecursoDao();
                    $DAO->__initialize();
                    $rh = $DAO->__SomaRH($_SESSION['codigo']);
                    $DAO->__finalize();
                    ?>

                    <?php
                    $DAO = new RecursoDao();
                    $DAO->__initialize();
                    $re = $DAO->__SomaRe($_SESSION['codigo']);
                    $DAO->__finalize();
                    ?>

                    <?php
                    $DAO = new RecursoDao();
                    $DAO->__initialize();
                    $rm = $DAO->__SomaRm($_SESSION['codigo']);
                    $DAO->__finalize();
                    ?>
    <?php $grafico = geraGrafico(600, 200, array($rh, $re, $rm), array("Recurso Humano", "Recurso Material", "Recurso Externo")) ?>
                    <img src="<?php echo $grafico ?>" title="Grafico de recursos" />
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
