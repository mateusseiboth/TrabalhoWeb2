<?php 
include 'banco.php';

    $id = $_GET['id'];

    $ativo = $_GET['ativo'];

    if ($ativo == 1) {
        alterarEstado($id, 0);
    } else {
        alterarEstado($id, 1);
    }