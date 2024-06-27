<?php

function output_header($status = true,
                       $titulo = null,
                       $dados  = array(),
                       $versao = 'v1') {

    header("Content-Type: application/json; charset=utf-8");
    echo json_encode(
        array('status' => $status,
              'titulo' => $titulo,
              'dados'  => $dados,
              'versao' => $versao)
    );

    // finalizar a execução
    exit;
}

function retorna_cadastro($status = null, $token = null) {
    header("Content-Type: application/json"); 
    header("charset=utf-8"); 	
    echo json_encode(
        array('status' => $status, 'token' => $token)
    );
    exit;
}
?>
