<?php

if (!isset($_SESSION))
    session_start();
/* import */
include_once('../Presenter/RecursoPresenter.php');

if (!isset($_SESSION)) {
    session_start();
}

$PBPresenter = new RecursoPresenter();
$p = $_GET['item'];

$retorno = $PBPresenter->__remove($p);

if ($retorno) {
  
     header("Location: http://localhost/Scrumtop/EstruturaPagina/recurso.php");

} else {
    ?> 

     <script>
        alert("Item removido ");

    </script>
    <?php

}
  