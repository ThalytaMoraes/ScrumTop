<?php

if (!isset($_SESSION))
    session_start();
/* import */
include_once('../Presenter/LoginPresenter.php');
if (!isset($_SESSION))
    session_start();
if (!array_key_exists('logado', $_SESSION))
    $_SESSION['logado'] = 'deslogado';


extract($_POST);
$Usuario = addslashes($Usuario);
$Senha = addslashes($Senha);
if ($Usuario != "" && $Senha != "") {
    $loginPresenter = new LoginPresenter();
    
    $retorno = $loginPresenter->__login($Usuario, $Senha);
   
    if ($retorno != null) {
         
        $loginPresenter->__redi($retorno[0]);
   } else {
        header("Location: http://localhost//Scrumtop/index.php?errorLogin=1");
    }
} else {
    header("Location: http://localhost//Scrumtop/index.php?errorLogin=2");
}
?>