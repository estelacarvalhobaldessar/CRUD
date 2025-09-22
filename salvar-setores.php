<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$nome = '';
$andar = '';
$cor = '';

if(isset($_GET['id'])){
  
  $id = $_GET['id'];
  $sql = "SELECT * FROM setor WHERE SetorID = {$id}";

  $resultado = mysqli_query($conexao, $sql);
  $dado = mysqli_fetch_assoc($resultado);
  
  $nome = $dado['Nome'];
  $andar = $dado['Andar'];
  $cor = $dado['Cor'];
}
?>

  <main>

    <div id="setores" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Setores</h2>
          <input type="text" placeholder="Nome do Setor" value="<?php echo $nome;?>">
          <input type="text" placeholder="Andar" value="<?php echo $andar;?>">
          <input type="text" placeholder="Cor" value="<?php echo $cor;?>">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>