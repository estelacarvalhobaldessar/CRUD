<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];
// validacao
switch ($acao) {
    case 'excluir':
        $sql = 'DELETE FROM cargos WHERE CargoID = '.$id;
        mysqli_query($conexao, $sql);
        header("Location: ../lista-cargos.php");
        break;
    
    default:
        # code...
        break;
}
?>