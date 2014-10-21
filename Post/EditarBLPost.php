<?php

if (!isset($_SESSION))
    session_start();
/* import */
include_once('../Presenter/CadastroProdutoBacklogPresenter.php');

if (!isset($_SESSION)) {
    session_start();
}

$PBPresenter = new CadastroBLPresenter;
$p = $_GET['item'];

$retorno = $PBPresenter->__remove($p);

if ($retorno) {
  
     header("Location: http://localhost/Scrumtop/EstruturaPagina/ProdutoBacklog.php");

} else {
    ?> 

     <script>
        alert("Item removido ");

    </script>
    <?php

}
  