<?php

if (!isset($_SESSION))
    session_start();
/* import */
include_once('../Presenter/ReuniRetroPresente.php');
include_once ('../EstruturaPagina/ReuniRetro.php');
if (!isset($_SESSION))
    session_start();

if (!array_key_exists('logado', $_SESSION))
    $_SESSION['logado'] = 'deslogado';


if ($_SESSION['logado'] == 'logado') {
    extract($_POST);
  
    $tituloP = addslashes($tituloN);
    $DescricaoP = addslashes($DescricaoN) ;
   
    if ($tituloP != "" && $DescricaoP != "" ) {
        $alunoPresenter = new ReuniRetro();
        $retorno = $alunoPresenter->__cadastroSimplesN($_SESSION['codigo'],$_SESSION['codigo'],$tituloP,$DescricaoP);
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
} else {
    ?> 

    <script>
        alert("O Cadastro não foi realizado porque você não está logado!");

    </script>
    <?php

}
?>