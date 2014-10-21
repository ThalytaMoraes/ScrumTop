<?php
;
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
            <title>   Cadastro de projeto   </title>
            <link rel="stylesheet" href="../templatemo_style.css" type="text/css">
            <script src="../jquery-1.4.1.min.js"></script>
            <link rel="stylesheet" href="../Estilo-formulario.css" type="text/css">


        </head>
        <body>

            <form method="POST" action="../Post/ProjetoPost.php">

                <div >
                    <legend><h3><b>Cadastrar Projeto</b></h3></legend>
                    <br>                    
                    <fieldset class="grupo">
                        <div class="campo">
                            <label>Nome do Projeto:</label> 
                            <input name="nome" type="text" style="width: 10em"id="nome" onMouseOver="this.focus()" class="cxtext">
                        </div>
                        <div class="campo">
                            <label>Scrum Master:</label> 
                            <select name="sm">  <option  ><?php echo $_SESSION['usuario'] ?> </option> </select>
                        </div>
                    </fieldset>
                    <br>
                     <fieldset class="grupo">
                    <div class="campo">
                        <label>Data de Início:</label> 
                        <input name="data" type="date" size="50" maxlength="50" id="data" onMouseOver="this.focus()" class="cxtext">
                    </div>
                    <div class="campo">
                        <label>Product Owner:</label> 
                        <input name="roi" type="text" style=" width: 15em" id="roi" onMouseOver="this.focus()" class="cxtext">
                    </div>
                         </fieldset>
                    <br> 
                    <div class="campo">
                        <label>Notas Gerais:</label> 
                        <textarea name="inf"  style=" width: 512; height: 148px;" ></textarea>
                    </div>

                  <div style="margin-left: 541px">    
                        <button type="submit" name="submit" style=" ;background:#006699;color:#ffffff; text-align: right">Enviar</button>
                        </div>
                </div>

            </form>
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

                <a href="../EstruturaPagina/index.html" class="current">Home</a> 

                <div class="cleaner h10"></div>



            </div>

    </html>


    <?php
} else {
    header("Location: http://g2.jeiks.net/Portal_DSW/index.php?sair");
}
?>

