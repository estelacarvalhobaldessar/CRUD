<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

// variaveis 
$nome = '';
$tetosalarial = '';

// verificar se o ID esta sendo passado pela URL
if( isset($_GET['id'])){
  // capturar o id
  $id = $_GET['id'];
  // monta o SQL
  $sql = "SELECT * FROM cargos WHERE CargoID = {$id}";
  // executar o SQL
  $resultado = mysqli_query($conexao, $sql);
  // transformar o resultado em array
  $dado = mysqli_fetch_assoc($resultado);
  // coloca os dados nas variaveis  
  $nome = $dado['Nome'];
  $tetosalarial = $dado['TetoSalarial'];
}
?>
  <main>

       <!-- Telas CRUD -->
   <div id="cargos" class="tela">
    <form class="crud-form" action="./action/cargos.php" method="post">
      <h2>Cadastro de Cargos</h2>
      <input type="text" placeholder="Nome do Cargo" value="<?php echo $nome;?>">
      <input type="number" placeholder="Teto Salarial" value="<?php echo $tetosalarial;?>">
      <button type="submit">Salvar</button>
    </form>
  </div>



   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
