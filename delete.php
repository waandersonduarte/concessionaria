<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>AGENDA</title>
    <link rel="stylesheet" href="css/estilo.css">

  </head>
  <body>
    <div class="container">
<?php
$x = $_GET['x'];
include('conexao.php');
  $sql = "DELETE FROM produto WHERE id = $x";
if (mysqli_query($conexao, $sql)) {
 header('location: listagem.php');
  echo "Cadastro Excluido Com Sucesso !...";
}
else {
  echo "Erro !";

}

 ?>
</div>
</body>
</html>
