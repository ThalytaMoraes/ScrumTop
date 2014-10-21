<?php

if (!isset($_SESSION))
    session_start();
/* import */
include_once('../Presenter/SprintBacklogPresenter.php');
include_once ('../EstruturaPagina/SprintBacklog.php');
if (!isset($_SESSION)) {
    session_start();
}

extract($_POST);


$esti = addslashes($esti);
$status = addslashes($status);


if ( $esti != "" && $status ) {
    $PBPresenter = new CadastroSPBPresenter();
    $retorno = $PBPresenter->__cadastroSimples($esti, $status);
      
    if ($retorno ==1) {
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
