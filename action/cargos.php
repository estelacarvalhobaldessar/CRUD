<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';

// captura a acao dos dados
$acao = $_GET['acao'];
$id = $_GET['id'];

// validacao
switch ($acao) {
    case 'excluir':
       // montare o sql
       $sql = 'DELETE FROM cargos WHERE CargoID ='.$id;
       //executar o sql
       mysqli_query($conexao,$sql);
       //redirecionar a pagina
       header("Location: ../lista-cargos.php");
        break;
    
    default:
        # code...
        break;
}
?>