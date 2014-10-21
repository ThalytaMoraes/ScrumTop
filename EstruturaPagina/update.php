<?php

header("Pragma: no-cache");
header("Cache-Control: no-cache, must-revalidate");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// o cabecalho acima é para evitar o cacheamento do browser.

include "process.php";
include_once '../DAO/SprintBacklogDao.php';

$id = $_POST['id'];
$novovalor = utf8_decode($_POST['novovalor']);
$campo = utf8_decode($_POST['campo']);
$DAO = new SprintBacklogDAO();
$DAO->__initialize();
$DAO->__alterarES($campo,$novovalor, $id, $_SESSION['codigo']);
// salvando as alteracoes no banco.
?>