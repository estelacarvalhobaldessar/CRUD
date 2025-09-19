<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

// pega o id
$id = $_GET['id'];

// montar o sql
$sql = "SELECT * FROM producao WHERE ProducaoID = $id;";
// executar o sql
$resultado = mysqli_query($conexao, $sql);
// pegar o dado
$dado = mysqli_fetch_assoc($resultado);

?>
  <main>

    <div id="producao" class="tela">
        <form class="crud-form" method="post" action="">
          <h2>Cadastro de Produção de Produtos</h2>
          <select>
            <option value="">Funcionário</option>
            <?php
            $sql = "SELECT * FROM funcionarios ORDER BY Nome;";
            $resultado = mysqli_query($conexao, $sql);
            while ( $cargo = mysqli_fetch_assoc($resultado)){
              $selecionado = '';
              if ( $dado['FuncionarioID'] == $cargo['CargoID']){
                $selecionado = 'selected';
              }
              echo "<option ".$selecionado." value='".$cargo['CargoID']."'>".$cargo['Nome']."</option>";
            }
            ?>
          </select>
          </select>
          <select>
            <option value="">Produto</option>
          </select>
          <label for="">Data da entrega</label>
          <input type="date" placeholder="Data da Entrega">
          <input type="number" placeholder="Quantidade Produzida">
          <button type="submit">Salvar</button>
        </form>
      </div>
   
  </main>
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>