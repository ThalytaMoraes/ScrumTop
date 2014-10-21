<?php

if (!isset($_SESSION))
    session_start();
include_once('AbstractDao.php');

class ReuniRevisaoDAO extends AbstractDao {

    // Construtor
    public function __construct() {
        parent::__construct();
    }

    public function __add($pCodSprint, $pCodProj, $status, $cod, $pronto) { 
        try {
            $this->__executeSQL("
                ");
        } catch (Exception $e) {

            throw $e;
        }
    }

   

}
