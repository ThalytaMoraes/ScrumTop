
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>   Cadastro de membro   </title>
        <link rel="stylesheet" href="../templatemo_style.css" type="text/css">
        <link rel="stylesheet" href="../Estilo-formulario.css" type="text/css">

        <script src="../jquery-1.4.1.min.js"></script>


    </head>
    <body>

        <form method="POST" action="../Post/MembroPost.php" style="margin-top: 80px; margin-left: 60px">
            <legend><h3><b>Cadastrar Membro ScrumTop</b></h3></legend>      
            <fieldset>
                <fieldset class="grupo">
                    <div class="campo">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome" style="width: 10em" value="" />
                    </div>
                    <div class="campo">
                        <label for="snome">Sobrenome</label>
                        <input type="text" id="snome" name="snome" style="width: 10em" value="" />
                    </div>
                </fieldset>

                <fieldset class="grupo">

                    <div class="campo">
                        <label for="email">E-mail (Será seu usuário ScrumTop)</label>
                        <input type="text" id="email" name="email" style="width: 20em" value="" />
                    </div>
                    <div class="campo">
                        <label for="senha">Senha</label> 
                        <input type="password" id="Senha" name="Senha" style="width: 9em" value="" />

                    </div>
                </fieldset>
                <div class="campo">
                    <label for="skpe">Usuário Skype</label>
                    <input type="tel" id="skype" name="skype" style="width: 10em"  value="" />
                </div>
                <div class="campo">
                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" style="width: 10em"  value="" />
                </div>

                <fieldset class="grupo">
                    <div class="campo">
                        <label for="cidade">Instituição</label>
                        <input type="text" id="instituto" name="instituto" style="width: 10em" value="" />
                    </div>

                </fieldset>

                <div class="campo">
                    <label for="mensagem"> Características Profissionais </label>
                    <textarea rows="6" style="width: 20em" id="mensagem" name="mensagem"></textarea>
                </div>


                <div style="margin-left: 541px">    
                    <button type="submit" name="submit" style=" ;background:#006699;color:#ffffff; text-align: right">Enviar</button>
                </div>
            </fieldset>
        </form>

        <div id="texto" style="color: red">
            <?php
            if (isset($_GET["errorLogin"])) {
                if ($_GET["errorLogin"] == "0") {
                    echo "Cadastro Realizado com sucesso!";
                }
                if ($_GET["errorLogin"] == "1") {
                    echo "Voce nao esta logado!";
                } else if ($_GET["errorLogin"] == "2") {
                    echo "Campo em branco!";
                }
            }
            ?>
        </div>



</html>





