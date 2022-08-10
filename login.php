<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<title></title>
</head>
<body>
<form action="index.php" method="POST">
	<label>E-mail:</label>
	<input type="text" name="email">
	<label>Senha:</label>
	<input type="password" name="senha">
	<input type="submit" value="Logar">
</form>
<?php 
$email = $_POST['email']??'';
$senha = $_POST['senha']??'';
include('conexao.php');
$sql = "INSERT INTO usuario (email,senha) VALUES('$email','$senha')";
if ($email !='') {
	if ($result = mysqli_query($conexao,$sql)) {
		echo "Logado Com Sucesso!";
	}else{
		echo "Erro!";
}
}
 ?>
</body>
</html>