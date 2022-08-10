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
       <h1>Pesquisar</h1><hr>
      <h4>Pesquisa No Banco De Dados</h4>

    <form action="pesquisa.php" method="POST">
    <input type="text" name="pesquisa" placeholder="Digite Sua Pesquisa...">
    <button>Pesquisar</button>
    </form>
    <hr>
    <?php
    include('conexao.php');
         if (isset($_POST['pesquisa'])) {
         $pesquisa = $_POST['pesquisa'];
         }else {
        $pesquisa = '';
        }

        $sql = "SELECT * FROM produto WHERE nome LIKE '%$pesquisa%' OR descricao LIKE '%$pesquisa% '";
        $return = mysqli_query($conexao,$sql);
        $quant = mysqli_num_rows($return);
        echo "<h4> $quant Registros encontrados!</h4>";

     ?>

      <table border="1">

    <th>Codigo</th>
    <th>Nome:</th>
    <th>Preço:</th>
    <th>Data de Validade:</th>
    <th>Descrição:</th>
    <?php
    while ($linha = mysqli_fetch_assoc($return)) {
    $id = $linha['id'];
    $nome = $linha['nome'];
    $preco = $linha['preco'];
    $data_validade = $linha['data_validade'];
    $descricao = $linha['descricao'];
                    
    $confirma ='return confirm("Tem Certeza?");';
    echo "<tr>
    <td>$id</td>
    <td>$nome</td>
    <td>$preco</td>
    <td>$data_validade</td>
    <td>$descricao</td>
    </tr>";
  }
         ?>

    </table>
     <h4><a href="listagem.php">Voltar</a></h4>
    </div>
    <div class="rodape">
        <?php include('rodape.php'); ?>
    </div>
</div>
</body>
</html>
     