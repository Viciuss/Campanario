<?php
// Início do arquivo PHP SEM espaços antes de <?php

require_once "funcs.php";
header('Content-Type: application/json'); // Define que a resposta será JSON

// Evitar que notices/warnings quebrem o JSON
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

// Cria objeto Confissao
$confissao = new Confissao();

// Captura ação enviada via POST ou GET
$acao = $_POST['func'] ?? $_GET['func'] ?? '';

switch ($acao) {
    case 'add':
        $texto = trim($_POST['texto'] ?? '');
        if ($texto === '') {
            echo json_encode(["success" => false, "error" => "Texto vazio"]);
            exit;
        }

        $ok = $confissao->add($texto);
        echo json_encode(["success" => $ok]);
        exit;

    default:
        echo json_encode(["success" => false, "error" => "Ação inválida"]);
        exit;
}
