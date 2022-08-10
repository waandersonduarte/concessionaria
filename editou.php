<?php

if (isset($_POST['nome'])) {
$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$data_validade = $_POST['data_validade'];
$descricao = $_POST['descricao'];

include('conexao.php');

$sql = "UPDATE produto SET nome ='$nome',preco ='$preco',data_validade ='$data_validade',descricao ='$descricao' WHERE nome=$nome";

if(mysqli_query($conexao, $sql)){
header('location: listagem.php');
}else {
  echo "Erro! Cadastro Não Alterado";
}
}