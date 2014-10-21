
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
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>   Gereciamento de tempo  </title>
                <link rel="stylesheet" href="../templatemo_style.css" type="text/css">
                <link rel="stylesheet" href="../Estilo-formulario.css" type="text/css">

                <script src="../jquery-1.4.1.min.js"></script>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
                <script src="jquery.tablesorter.min.js"></script>
                <script src="jquery.tablesorter.pager.js"></script>
                <link rel="stylesheet" href="custom.css" media="screen" />

                <script type="text/javascript">
                    $(document).ready(function() {

                        var events = [
                            {dates: [new Date(2014, 2, 31)], title: "2011 Season Opener", section: 0},
                            {dates: [new Date(2014, 1, 29)], title: "Spring Training Begins", section: 2},
                            {dates: [new Date(2014, 3, 5)], title: "Atlanta Braves @ New York Mets Game 1", section: 1},
                            {dates: [new Date(2014, 3, 7)], title: "Atlanta Braves @ New York Mets Game 2", section: 1},
                            {dates: [new Date(2014, 3, 8)], title: "Atlanta Braves @ New York Mets Game 3", section: 1},
                            {dates: [new Date(2014, 3, 9), new Date(2014, 3, 11)], title: "Atlanta Braves @ Houston Astros", section: 1},
                            {dates: [new Date(2014, 3, 13), new Date(2014, 3, 15)], title: "Milwaukee Brewers @ Atlanta Braves", section: 1},
                            {dates: [new Date(2014, 3, 9), new Date(2014, 3, 11)], title: "Boston Red Sox @ Toronto Blue Jays", section: 1},
                            {dates: [new Date(2014, 3, 13), new Date(2014, 3, 15)], title: "Baltimore Orioles @ Toronto Blue Jays", section: 1},
                            {dates: [new Date(2014, 3, 17), new Date(2014, 3, 19)], title: "Tampa Bay Rays @ Toronto Blue Jays", section: 1},
                            {dates: [new Date(2014, 3, 20), new Date(2014, 3, 23)], title: "Toronto Blue Jays @ Kansas City Royals", section: 1},
                            {dates: [new Date(2014, 3, 5)], title: "Opening Day for 12 Teams", section: 1},
                            {dates: [new Date(2014, 2, 28)], title: "Seattle Mariners v. Oakland A's", section: 1, description: "Played in Japan!"},
                            {dates: [new Date(2014, 4, 18), new Date(2014, 5, 24)], title: "Interleague Play", section: 1},
                            {dates: [new Date(2014, 5, 10)], title: "All-Star Game", section: 1},
                            {dates: [new Date(2014, 9, 24)], title: "World Series Begins", section: 3}
                        ];

                        var sections = [
                            {dates: [new Date(2014, 2, 31), new Date(2014, 9, 28)], title: "2011 MLB Season", section: 0, attrs: {fill: "#d4e3fd"}},
                            {dates: [new Date(2014, 2, 28), new Date(2014, 9, 3)], title: "2012 MLB Regular Season", section: 1, attrs: {fill: "#d4e3fd"}},
                            {dates: [new Date(2014, 1, 29), new Date(2014, 3, 4)], title: "Spring Training", section: 2, attrs: {fill: "#eaf0fa"}},
                            {dates: [new Date(2014, 9, 4), new Date(2014, 9, 31)], title: "2012 MLB Playoffs", section: 3, attrs: {fill: "#eaf0fa"}}
                        ];


                        var sections2 = [
                            {dates: [new Date(2014, 2, 31), new Date(2014, 9, 28)], title: "2014 Inicio do projeto", section: 0, attrs: {fill: "##e3f0fe"}},
                            {dates: [new Date(2014, 2, 28), new Date(2014, 9, 3)], title: "2014 SPRINT1", section: 1, attrs: {fill: "#e3f0fe"}},
                            {dates: [new Date(2014, 1, 29), new Date(2014, 3, 4)], title: "2014-Sprint 3", section: 2, attrs: {fill: "#cce5ff"}},
                            {dates: [new Date(2014, 9, 4), new Date(2014, 9, 31)], title: "2012 MLB Playoffs", section: 3, attrs: {fill: "#cce5ff"}}
                        ];

                        var timeline2 = new Chronoline(document.getElementById("target2"), events,
                                {visibleSpan: DAY_IN_MILLISECONDS * 91,
                                    animated: true,
                                    tooltips: true,
                                    defaultStartDate: new Date(2014, 3, 5),
                                    sections: sections2,
                                    sectionLabelAttrs: {'fill': '#997e3d', 'font-weight': 'bold'},
                                    labelInterval: isFifthDay,
                                    hashInterval: isFifthDay,
                                    scrollLeft: prevMonth,
                                    scrollRight: nextMonth,
                                    markToday: 'labelBox',
                                    draggable: true
                                });


                    });
                </script>


                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
                <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/qtip2/2.0.1/jquery.qtip.min.css" />
                <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/qtip2/2.0.1/jquery.qtip.min.js"></script>

                <script type="text/javascript" src="chronoline/raphael-min.js"></script>

                <link rel="stylesheet" type="text/css" href="chronoline/chronoline.css" />
                <script type="text/javascript" src="chronoline/chronoline.js"></script>
            </head>
            <meta charset='utf-8' />
            <meta http-equiv="X-UA-Compatible" content="chrome=1" />
            <meta name="description" content="Chronoline.js : chronoline.js is a library for making a chronology timeline out of events on a horizontal timescale." />

            <link rel="stylesheet" type="text/css" media="screen" href="stylesheets/stylesheet.css">

        </head>


        <body>
            <ul id="sddm">
                <li><a href="../EstruturaPagina/configuracao"><img src="../images/menu/configuration-icon.png" border="0"  height="20px" /> Configurações</a></li>
                <li><a href="../EstruturaPagina/Recurso.php"><img src="../images/menu/logo.png" border="0" height="20px"/>Recursos</a></li>
                <li><a href="../EstruturaPagina/Cronograma.php"><img src="../images/menu/logo.png" border="0" height="20px"/>Cronograma</a></li>
                <li><a href="../EstruturaPagina/Principal.php"><img src="../images/menu/logo.png" border="0" height="20px"/>Scrum</a></li>
                <li><a href=""><img src="../images/menu/mais.png"  border="0" height="50px"/>Projeto</a></li>

            </ul>



            <div id="templatmeo_content" >

                <!-- HEADER -->
                <div id="header_wrap" class="outer">
                    <header class="inner">


                    </header>
                </div>

                <!-- MAIN CONTENT -->
                <div id="main_content_wrap" class="outer">
                    <section id="main_content" class="inner">



                        <h2>Gerenciamento de Tempo</h2>
                        <p> O campo tempo mostra de forma mais clara todas as tarefas alocadas na linha de tempo. </p>
<p>Tarefas com demanda de tempo maior, e que possam ser prejudiciais, devem ser relatadas na reunião de retrospectiva. </p>
<p>Para verificar todas as macros do projeto, arraste a linha de tempo abaixo. A descriçao é obtida ao passar o mouse sobre a linha do tempo.</p> <div id="target2" class="timeline-tgt">
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





