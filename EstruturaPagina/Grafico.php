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
            <title>   Grafico    </title>
            <link rel="stylesheet" href="../templatemo_style.css" type="text/css">
            <script src="../jquery-1.4.1.min.js"></script>
            <script src="../jquery-1.4.1.min.js"></script>
            <?php
            $DAO = new SprintBacklogDAO();
            $DAO->__initialize();
            echo $DAO->__grafico($_SESSION['codigo']);
            $DAO->__finalize();
            ?> 

            <script>
                window.onload = function()
                {
                    var meuGraficoBurn = new RGraph.Bar('meuCanvasGraficoIdades', resultado);
                    meuGraficoBurn.Set('chart.background.barcolor1', 'white');
                    meuGraficoBurn.Set('chart.background.barcolor2', 'white');
                    meuGraficoBurn.Set('chart.title', 'Gráfico Burndown');
                    meuGraficoBurn.Set('chart.title.vpos', 0.7);
                    meuGraficoBurn.Set('chart.labels', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15']);
                    meuGraficoBurn.Set('chart.tooltips', ['Esforço foi de  ' + um, 'Esforço foi de  ' + dois, 'Esforço foi de  ' + tres, 'Esforço foi de  ' + quatro, 'Esforço foi de  ' + cinco, 'Esforço foi de  ' + seis, 'Esforço foi de  ' + sete,
                        'Esforço foi de  ' + oito, 'Esforço foi de  ' + nove, 'Esforço foi de  ' + dez, 'Esforço foi de  ' + once, 'Esforço foi de  ' + doze, 'Esforço foi de  ' + treze, 'Esforço foi de  ' + quatroze, 'Esforço foi de  ' + quinze, ]);
                    meuGraficoBurn.Set('chart.text.angle', 55);
                    meuGraficoBurn.Set('chart.gutter', 100);
                    meuGraficoBurn.Set('chart.shadow', true);
                    meuGraficoBurn.Set('chart.shadow.blur', 7);
                    meuGraficoBurn.Set('chart.shadow.color', '#aaa');
                    meuGraficoBurn.Set('chart.shadow.offsety', -2);
                    meuGraficoBurn.Set('chart.colors', ['#00CED1']);
                    meuGraficoBurn.Set('chart.key.position', 'gutter');
                    meuGraficoBurn.Set('chart.text.size', 10);
                    meuGraficoBurn.Set('chart.text.font', 'Arial');
                    meuGraficoBurn.Set('chart.text.angle', 45);
                    meuGraficoBurn.Set('chart.grouping', 'stacked');
                    meuGraficoBurn.Set('chart.strokecolor', 'rgba(0,0,0,0)');
                    meuGraficoBurn.Draw();
                }
            </script>
            <script src="../JavaScript/RGraph.common.core.js" ></script>
            <script src="../JavaScript/RGraph.common.annotate.js" ></script>
            <script src="../JavaScript/RGraph.common.context.js" ></script>
            <script src="../JavaScript/RGraph.common.tooltips.js" ></script>
            <script src="../JavaScript/RGraph.common.resizing.js" ></script>
            <script src="../JavaScript/RGraph.common.dynamic.js" ></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
            <script src="../JavaScript/RGraph.bar.js" ></script>

        </head>
        <body>

            <div style="margin-top: 20%;margin-left: 15%">

                <?php
                $DAO = new SprintBacklogDAO();
                $DAO->__initialize();
                echo $DAO->__grafico($_SESSION['codigo']);
                $DAO->__finalize();
                ?> 

                <div style="float: left">
                    <canvas id="meuCanvasGraficoIdades" width="600" height="350">[No canvas support]</canvas>
                </div>
            </div>
           

    </html>


    <?php
} else {
    header("Location: http://g2.jeiks.net/Portal_DSW/index.php?sair");
}
?>

