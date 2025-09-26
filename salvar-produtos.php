<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$nome = '';
$preco = '';
$peso = '';
$descricao = '';
$categoria = '';

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT * FROM produtos WHERE produtoID = {$id}";
  $resultado = mysqli_query($conexao, $sql);
  $dado = mysqli_fetch_assoc($resultado);
  
  $nome = $dado['Nome'];
  $preco = $dado['Preco'];
  $peso = $dado['Peso'];
  $descricao = $dado['Descricao'];
  $categoria = $dado['CategoriaID'];

}

?>
  
  <main>

    <div id="produtos" class="tela">
        <form class="crud-form" action="" method="post">
          <h2>Cadastro de Produtos</h2>
          <input type="text" placeholder="Nome do Produto" value="<?php echo $nome?>">
          <input type="number" placeholder="Preço" value="<?php echo $preco?>">
          <input type="number" placeholder="Peso (g)" value="<?php echo $peso?>">
          <textarea placeholder="Descrição"><?php echo $descricao?></textarea>
          <select>
            <?php
            $sql = "SELECT * FROM categorias ORDER BY nome;";
            $resultado = mysqli_query($conexao,$sql);
            while($categoria = mysqli_fetch_assoc($resultado)){
              $selecionado='';
              if ($dado[$CategoriaID]==$categoria['CategoriaID']){
                $selecionado = 'selected';
              }
              echo '<option value='.$dado['CategoriaID'].'>'.$dado['Nome'].'</option>';
            }

            ?>
            
          </select>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>