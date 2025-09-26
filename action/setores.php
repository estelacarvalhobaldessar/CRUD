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
        $sql = 'DELETE FROM setores WHERE SetorID = '.$id;
        mysqli_query($conexao, $sql);
        header("Location: ../lista-setores.php");
        break;
      
    case 'salvar':
        $Nome = $_POST['Nome'];
        $Andar = $_POST['Andar'];
        $Cor = $_POST['Cor'];
        
        if (empty($id)) {
         // INSERT
        $sql = "INSERT INTO setor (Nome, Andar, Cor)
         VALUES ('$Nome', '$Andar', '$Cor')";
        } else {
         // UPDATE  
        $sql = "UPDATE setor 
        SET Nome = '$Nome', 
        Andar = '$Andar', 
        Cor = '$Cor'
         WHERE SetorID = $id";
        }
        mysqli_query($conexao, $sql);
        header("Location: ../lista-setores.php");
        break;

    default:
        # code...
        break;
}
?>