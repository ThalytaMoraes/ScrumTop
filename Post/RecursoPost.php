<?php

if (!isset($_SESSION))
    session_start();
/* import */
include_once('../Presenter/RecursoPresenter.php');
include_once ('../EstruturaPagina/Recurso.php');
if (!isset($_SESSION)) {
    session_start();
}

extract($_POST);

$pnome = addslashes($nome);
$pdescricao = addslashes($desc);
$valor = addslashes($valor);
$tipo = addslashes($tipo);


if ($pnome != "" && $pdescricao != "" && $valor != "" && $tipo != ""  ) {
    $PBPresenter = new RecursoPresenter();
    $retorno = $PBPresenter->__cadastroSimples($pnome, $pdescricao, $valor, $tipo);
      
    if ($retorno) {
            ?> 

            <script>
                alert("Cadastro realizado com sucesso!");

            </script>
            <?php
                 //fechar a pagina e voltar 
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
