<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$nome = '';
$datan = '';
$email = '';
$salario = '';
$sexo = '';
$cpf = '';
$rg = '';
$cargo = '';
$setor = '';

if(isset($_GET['id'])){
  
  $id = $_GET['id'];
  $sql = "SELECT * FROM funcionarios WHERE FuncionarioID = {$id}";

  $resultado = mysqli_query($conexao,$sql);
  $dado = mysqli_fetch_assoc($resultado);

  $nome = $dado['Nome'];
  $datan = $dado['DataNascimento'];
  $email = $dado['Email'];
  $salario = $dado ['Salario'];
  $sexo = $dado['Sexo'];
  $cpf = $dado['CPF'];
  $rg = $dado['RG'];
  $cargo = $dado['CargoID'];
  $setor = $dado['SetorID'];

}


?>

  
  <main>

    <div id="funcionarios" class="tela">
        <form class="crud-form">
          <h2>Cadastro de Funcionários</h2>
          <input type="text" placeholder="Nome" value="<?php echo $nome;?>">
          <input type="date" placeholder="Data de Nascimento" value="<?php echo $datan;?>">
          <input type="email" placeholder="Email" value="<?php echo $email;?>">
          <input type="number" placeholder="Salário" value="<?php echo $salario;?>">
          <select>
            <option value="">Sexo</option>
            <option value="M" <?php if($sexo == 'M'){ echo 'selected';}else{ echo '';}?>>Masculino</option>
            <option value="F">Feminino</option>
          </select>
          <input type="text" placeholder="CPF" value="<?php echo $cpf;?>">
          <input type="text" placeholder="RG" value="<?php echo $rg;?>" >
          
          <select>
            <option value="">Cargo</option>
            <?php 
            // variavel do SQL 
            $sql = 'SELECT * FROM cargos;';
            $resultado = mysqli_query($conexao,$sql);
            while($dado = mysqli_fetch_assoc($resultado)){
              $selecionado = '';
              if( $cargo == $dado['CargoID']){
                $selecionado = 'selected';
              }
              echo '<option '.$selecionado.' value='.$dado['CargoID'].'>'.$dado['Nome'].'</option>';
            }
            ?>
          </select>

          <select>
            <?php
            $sql = 'SELECT * FROM setor;';
            $resultado = mysqli_query($conexao,$sql);
            while($dado = mysqli_fetch_assoc($resultado)){
              $selecionado = '';
              if( $setor == $dado['SetorID']){
                $selecionado = 'selected';
              }
              echo ' <option value='.$dado['SetorID'].'>'.$dado['Nome'].'</option>';
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
