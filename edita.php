
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AGENDA</title>
    <link rel="stylesheet" href="css/estilo.css">

  </head>
  <body>
  <div class="container">
  <div class="cabecalho">
    <?php include('cabecalho.php'); ?>
  </div>
  <div class="menu">
    <?php include('menu.php'); ?>
  </div>
    <div class="conteudo">
      <h1>Editar</h1>
      <form action="edita.php" method="POST">
              <?php $id= $_GET['id']?>
              <fieldset><legend>Atualizar Dados</legend>
              <label>Código:</label>
              <input type="text" name="id" value="<?php echo $_GET['id']?>" /> 
              <label>Marca:</label>
              <input type="text" name="marca" value="<?php echo $_GET['marca']?>"/> 
              <label>Modelo:</label>
              <input type="text" name="modelo" value="<?php echo $_GET['modelo']?>"/>
              <label>Cor:</label>
              <input type="text" name="cor" value="<?php echo $_GET['cor']?>"/>
              <label>Preço:</label>
              <input type="text" name="preco" value="<?php echo $_GET['preco']?>"/>
              <label>Ano de Fabricação:</label>
              <input type="text" name="ano_fabricacao" value="<?php echo $_GET['ano_fabricacao']?>"/>
              <label>Ano de Compra:</label>
              <input type="text" name="ano_compra" value="<?php echo $_GET['ano_compra']?>"/>
              </fieldset>
              <button>Salvar</button>

      </form>
     <?php

if (isset($_POST['marca'])) {
$id = $_POST['id'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$cor = $_POST['cor'];
$preco = $_POST['preco'];
$ano_fabricacao= $_POST['ano_fabricacao'];
$ano_compra = $_POST['ano_compra'];

include('conexao.php');

$sql = "UPDATE produto SET marca ='$marca',modelo ='$modelo',cor ='$cor',preco='$preco',ano_fabricacao='$ano_fabricacao',ano_compra='$ano_compra' WHERE id=$id";

if(mysqli_query($conexao, $sql)){
header('location: listagem.php');
}else {
  echo "Erro! Cadastro Não Alterado";
}
}
?>
<a href="listagem.php">Voltar</a>
   <div class="rodape">
    <?php include('rodape.php'); ?>
  </div>
   </div>
 </body>
</html>
