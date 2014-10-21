<?php

if (!isset($_SESSION))
    session_start();
/* import */
include_once('../Presenter/PlanejamentoPresenter.php');
if (!isset($_SESSION)) {
    session_start();
}

extract($_POST);

$local = addslashes($local);
$hora = addslashes($hora);
$qaunt = addslashes($qaunt);
$obj = addslashes($obj);


if ($local != "" && $hora != "" && $qaunt != "" && $obj != ""  ) {
    $PBPresenter = new PlanejamentoPresenter();
    $retorno = $PBPresenter->__cadastroSimples($local, $hora, $qaunt,$obj);
      
    if ($retorno) {
            ?> 

            <script>
                alert("Cadastro realizado com sucesso!");

            </script>
            <?php

        } else {
            ?> 

            <script>
                $("#loescrito").html("Cadastro não realizado")

            </script>
            <?php

        }
    } else {
        ?> 
        <script>
            $("#loescrito").html("Existem campos em branco, favor verificar")

        </script>

        <?php

    }
