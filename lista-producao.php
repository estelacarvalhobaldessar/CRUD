<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
?>
  <main>

    <div class="container">
        <h1>Lista de Produções</h1>
        <a href="./salvar-producao.php" class="btn btn-add">Incluir</a> 
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Produto</th>
              <th>Data Produção</th>
              <th>Data Entrega</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $sql = 'SELECT * FROM producao';
            $resultado = mysqli_query($conexao,$sql);
            while ( $dado = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
              <td><?php echo $dado ['ProducaoID'];?></td>
              <td><?php echo $dado ['ProdutoID'];?></td>
              <td><?php echo $dado ['DataProducao'];?></td>
              <td><?php echo $dado ['DataEntrega'];?></td>
              <td>
              <a href="salvar-producao.php?id=" class="btn btn-edit">Editar</a>
              <a href="./action/producao.php?&acao=excluir&id=<?php echo $dado['ProducaoID']?>" class="btn btn-delete">Excluir</a>
              </td>
            </tr>
            <?php          
            }
            ?>
            
          </tbody>
        </table>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>