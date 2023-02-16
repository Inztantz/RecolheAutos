<?php session_start(); include_once("lib/includes.php"); ?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
	<link href="../libs/css/styles.css" rel="stylesheet">
	<link rel="icon" type="image/png" href="../sistema/img/favicon.png">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

	<script src="../libs/js/mask.js"></script>
	<script src="../libs/js/check.js"></script>
	<script src="../libs/js/showpass.js"></script>
	<script src="../libs/js/validarSenha.js"></script>

	<style> body { background-image: url('../sistema/img/bg.jpg'); } </style>
</head>

<body>
	<div class="container" id="main">
		<div class="card bg-dark" style="padding: 10px 10px 10px; margin-bottom: 5px;">
			<img id="logo" draggable="false" src="../sistema/img/logo.png" width="188" height="54" style="margin: 0 auto;">
		</div>
		<?php

			$url = (isset($_GET['p'])) ? $_GET['p'] : 'inicio';
			$dir = "pags/";
			$ext = ".php";
			if(file_exists($dir.$url.$ext))
			{
				include($dir.$url.$ext);
			}
			else
			{
				echo '<div class="alert alert-danger bg-danger border-danger text-white">
						<br><h4>Página não encontrada</h4>
						<a class="btn text-dark" href="../sistema"><i class="fa fa-home"></i> <h6>Voltar à Página Inicial</h6></a>
					  </div>';
			}	
		?>
		<div class="card bg-dark text-light" style="font-size: 14px; padding: 10px 10px 10px; margin-top: 5px; text-align: center;">
			© 2019 Recolhe Autos, Todos os direitos reservados
		</div>
	</div>
</body>
</html>	