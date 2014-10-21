<?php

if (!isset($_SESSION))
    session_start();
/* import */
include_once('../Presenter/ProjetoPresenter.php');
include_once ('../EstruturaPagina/cadastroProjeto.php');
if (!isset($_SESSION))
    session_start();

if (!array_key_exists('logado', $_SESSION))
    $_SESSION['logado'] = 'deslogado';


if ($_SESSION['logado'] == 'logado') {
    extract($_POST);
  
    $pnome = addslashes($nome);
    $scrummaster = addslashes($sm) ;
    $data = addslashes($data);
    $proi = addslashes($roi);
    $info = addslashes($inf);
    if ($pnome != "" && $scrummaster != "" && $data != ""  && $proi != "" && $info != "") {
        $alunoPresenter = new ProjetoPresenter();
        $retorno = $alunoPresenter->__cadastroSimples($pnome,$scrummaster,$data,$proi,$info);
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