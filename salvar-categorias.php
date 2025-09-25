<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$nome = '';
$descricao = '';

if(isset($_GET['id'])){

  $id = $_GET['id'];
  $sql = "SELECT * FROM categorias WHERE CategoriaID = {$id}";

  $resultado = mysqli_query($conexao,$sql);
  $dado = mysqli_fetch_assoc($resultado);

  $nome = $dado['Nome'];
  $descricao = $dado['Descricao'];

}

?>
  <main>

    <div id="categorias" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Categorias</h2>
          <input type="text" placeholder="Nome da Categoria" value="<?php echo $nome;?>">
          <textarea placeholder="Descrição"><?php echo $descricao;?></textarea>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
