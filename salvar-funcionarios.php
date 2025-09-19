<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

// pega o id
$id = $_GET['id'];

// montar o sql
$sql = "SELECT * FROM funcionarios WHERE FuncionarioID = $id;";
// executar o sql
$resultado = mysqli_query($conexao, $sql);
// pegar o dado
$dado = mysqli_fetch_assoc($resultado);
?>

  
  <main>

    <div id="funcionarios" class="tela">
        <form class="crud-form">
          <h2>Cadastro de Funcionários</h2>
          <input type="text" placeholder="Nome" value="<?php echo $dado['Nome'];?>">
          <input type="date" placeholder="Data de Nascimento" value="<?php echo $dado['DataNascimento'];?>">
          <input type="email" placeholder="Email" value="<?php echo $dado['Email'];?>">
          <input type="number" placeholder="Salário" value="<?php echo $dado['Salario'];?>">
          <select>
            <option value="">Sexo</option>
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            
          </select>
          <input type="text" placeholder="CPF">
          <input type="text" placeholder="RG">
          <select>
            <option value="">Cargo</option>
            <?php
            $sql = "SELECT * FROM cargos ORDER BY Nome;";
            $resultado = mysqli_query($conexao, $sql);
            while ( $cargo = mysqli_fetch_assoc($resultado)){
              $selecionado = '';
              if ( $dado['CargoID'] == $cargo['CargoID']){
                $selecionado = 'selected';
              }
              echo "<option ".$selecionado." value='".$cargo['CargoID']."'>".$cargo['Nome']."</option>";
            }
            ?>
          </select>
          <select>
            <option value="">Setor</option>
            <?php
            $sql = "SELECT * FROM setor ORDER BY Nome;";
            $resultado = mysqli_query($conexao, $sql);
            while ( $setor = mysqli_fetch_assoc($resultado)){
              $selecionado = '';
              if ( $dado['SetorID'] == $setor['SetorID']){
                $selecionado = 'selected';
              }
              echo "<option ".$selecionado." value='".$setor['SetorID']."'>".$setor['Nome']."</option>";
            }
            ?>
          </select>
          </select>
          <button type="submit">Salvar</button>
        </form>
      </div>


   
  </main>

  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>
