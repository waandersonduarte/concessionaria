<?php  
//ESTABELECENDO A CONEXÃO COM O BD
$conexao = mysqli_connect('localhost', 'root','', 'trabalho_m3');

//Escolhendo padrão de caracteres
mysqli_set_charset($conexao, 'utf8');
?>