<?php

if (!isset($_SESSION))
    session_start();
/* import */
include_once('../Presenter/CadastroProdutoBacklogPresenter.php');
include_once ('../EstruturaPagina/CadastroProdutoBacklog.php');
if (!isset($_SESSION)) {
    session_start();
}

extract($_POST);

$desc = addslashes($desc);
$esti = addslashes($esti);
$status = addslashes($status);


if ($desc != "" && $esti != "" && $status ) {
    $PBPresenter = new CadastroBLPresenter;
    $retorno = $PBPresenter->__cadastroSimples($desc, $esti, $status);
      
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
