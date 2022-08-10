<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
    <title>HOME</title>
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
    <h1>Cadastrar Automóveis</h1>
        <form action="listagem.php" method="POST">
            <fieldset><legend><h4>Cadastro de Automóveis</h4></legend>
                <label>Marca:</label>
                <input type="text" name="marca" placeholder="Digite a Marca...">
                <label>Modelo:</label>
                <input type="text" name="modelo" placeholder="Digite o Modelo...">
                <label>Cor:</label>
                <input type="text" name="cor" placeholder="Digite a Cor Desejada...">
                <label>Preço:</label>
                <input type="text" name="preco" placeholder="Digite o Preço...">
                <label>Ano de Fabricação:</label>
                <input type="text" name="ano_fabricacao" placeholder="Digite a Data...">
                <label>Ano de Compra:</label>
                <input type="text" name="ano_compra" placeholder="Digite a Data...">
            </fieldset>
                <button>Cadastrar</button>
        </form>
        <?php
                $marca = $_POST['marca'] ?? '';
                $modelo = $_POST['modelo'] ?? '';
                $cor = $_POST['cor'] ?? '';
                $preco = $_POST['preco'] ?? '';
                $ano_fabricacao = $_POST['ano_fabricacao'] ?? '';
                $ano_compra = $_POST['ano_compra'] ?? '';

                include('conexao.php');

                $sql = "INSERT INTO produto VALUES (NULL,'$marca','$modelo','$cor','$preco','$ano_fabricacao','$ano_compra')";
                if ($marca != '') {
  
   if ($resul = mysqli_query($conexao, $sql)) {
   echo "<h3>Cadastrado com sucesso!</h3>";
   }else{
    echo "Erro!";
   }
}
         ?>
        
        <h1>Lista De Automóveis</h1>

    <form method="POST">
    <input type="text" name="pesquisa" placeholder="Digite Sua Pesquisa...">
    <button>Pesquisar</button>
    </form>
    <hr>
    </form>
    <?php
    include('conexao.php');
    if (isset($_POST['pesquisa'])) {
    $pesquisa = $_POST['pesquisa'];
    }else {
    $pesquisa = '';
    }

    $sql = "SELECT * FROM produto WHERE marca LIKE '%$pesquisa%' OR modelo LIKE '%$pesquisa% '";
    $return = mysqli_query($conexao,$sql);
    $quant = mysqli_num_rows($return);
    echo "<h4> $quant Registros Encontrados!</h4>";
     ?>
         <table border="1">
         <th>Código:</th>
         <th>Marca:</th>
         <th>Modelo:</th>
         <th>Cor:</th>
         <th>Preço:</th>
         <th>Ano de Fabricação:</th>
         <th>Ano de Compra:</th>
         <th>Ações:</th>
    <?php
          while ($linha = mysqli_fetch_assoc($return)) {
          $id = $linha['id'];
          $marca = $linha['marca'];
          $modelo = $linha['modelo'];
          $cor = $linha['cor'];
          $preco = $linha['preco'];
          $ano_fabricacao = $linha['ano_fabricacao'];
          $ano_compra = $linha['ano_compra'];
          $confirma ='return confirm("Tem Certeza?");';
           echo "
          <tr>
          <td>$id</td>
          <td>$marca</td>
          <td>$modelo</td>
          <td>$cor</td>
          <td>$preco</td>
          <td>$ano_fabricacao</td>
          <td>$ano_compra</td>
          <td><a href='delete.php?x=$id' onclick='$confirma'>Excluir</a> ||
          <a href='edita.php?id=$id&marca=$marca&modelo=$modelo&cor=$cor&preco=$preco&ano_fabricacao=$ano_fabricacao&ano_compra=$ano_compra'>Editar</a> ||
          <a href='carros.php'>Imagens</a></td>
          </tr>";

  }
    ?>
      </table>
      <h4><a href="index.php">Voltar</a></h4>
    </div>
    <div class="rodape">
        <?php include('rodape.php'); ?>
    </div>
</div>
</body>
</html>