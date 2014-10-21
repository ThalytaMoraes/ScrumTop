<?php

header("Pragma: no-cache");
header("Cache-Control: no-cache, must-revalidate");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// o cabecalho acima é para evitar o cacheamento do browser.

include "processTask.php";
include_once '../DAO/SprintBacklogDao.php';

$id = $_POST['id'];
$novovalor = utf8_decode($_POST['novovalor']);
$DAO = new SprintBacklogDAO();
$DAO->__initialize();
$DAO->__alterar($novovalor, $id, $_SESSION['codigo']);
// salvando as alteracoes no banco.
?>