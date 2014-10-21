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
            <title>   Selecionar Membros  </title>
            <link rel="stylesheet" href="../templatemo_style.css" type="text/css">
            <script src="../jquery-1.4.1.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
            <script src="jquery.tablesorter.min.js"></script>
            <script src="jquery.tablesorter.pager.js"></script>
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

            <div id="templatemo_content_wrapper">


                <div id="templatmeo_content">
                    <p></p>

                    <form method="post" action="exemplo.html" id="frm-filtro">
                        <p>
                            <label for="pesquisar">Pesquisar</label>
                            <input type="text" id="pesquisar" name="pesquisar" size="30" />
                        </p>
                    </form>

                    <table cellspacing="0" summary="Tabela de dados fictícios">
                        <thead>
                            <tr>
                                <th><input type="checkbox" value="1" id="marcar-todos" name="marcar-todos" /></th>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Instituto</th>
                                 <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                                        $DAO = new MembroDao();
                                        $DAO->__initialize();
                                        echo $DAO->__retornaMembros('ufes');
                                        $DAO->__finalize();
                                        ?> </tbody>
                    </table>

                    <div id="pager" class="pager">
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

                            $("table")
                                    .tablesorter({
                                        dateFormat: 'uk',
                                        headers: {
                                            0: {
                                                sorter: false
                                            },
                                            5: {
                                                sorter: false
                                            }
                                        }
                                    })
                                    .tablesorterPager({container: $("#pager")})
                                    .bind('sortEnd', function() {
                                        $('table > tbody > tr').removeClass('odd');
                                        $('table > tbody > tr:odd').addClass('odd');
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