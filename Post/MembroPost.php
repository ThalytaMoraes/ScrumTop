<?php

if (!isset($_SESSION))
    session_start();
/* import */
include_once('../Presenter/CadastroMembro.php');
include_once ('../EstruturaPagina/cadastroMembro.php');
if (!isset($_SESSION)) {
    session_start();
}

extract($_POST);

$nome = addslashes($nome);
$snome = addslashes($snome);
$mail = addslashes($email);
$senha = addslashes($Senha);
$skype = addslashes($skype);
$instituto = addslashes($instituto);
$telefone = addslashes($telefone);
if ($nome != "" && $email != "" && $senha != "" && $instituto != "" && $telefone != "" && $snome != "" ) {
    $alunoPresenter = new CadastroMembroPresenter();
    $retorno = $alunoPresenter->__cadastroSimples($nome, $snome, $email, $senha, $instituto, $telefone, $skype);
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
