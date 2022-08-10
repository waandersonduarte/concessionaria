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
	<h1>Contato</h1>
		<form action="contato.php" method="POST">
			<fieldset><legend>Dados Para Contato</legend>
				<label>Nome:</label>
				<input type="text" name="nome" placeholder="Digite Seu Nome...">
				<label>E-mail:</label>
				<input type="email" name="email" placeholder="Digite Seu E-mail...">
				<label>Mensagem:</label>
				<textarea name="mensagem" rows="8" placeholder="Digite Sua Mensagem..."></textarea>
				</fieldset>
			    <button>Enviar</button>
		</form>
		<?php
                $nome = $_POST['nome'] ?? '';
                $email = $_POST['email'] ?? '';
                $mensagem = $_POST['mensagem'] ?? '';

                include('conexao.php');

                $sql = "INSERT INTO contato VALUES (NULL,'$nome','$email','$mensagem')";
                if ($nome != '') {
  
   if ($resul = mysqli_query($conexao, $sql)) {
   echo "<h3>Enviado com sucesso!</h3>";
   }else{
   	echo "Erro!";
   }
}
		 ?>
		  <h4><a href="index.php">Voltar</a></h4>

	</div>
		<div class="rodape">
		<?php include('rodape.php'); ?>
	</div>
</div>
</body>
</html>