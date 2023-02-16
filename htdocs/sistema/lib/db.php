<?php
	$host = '';
	$usuario = '';
	$senha = '';
	$db = '';

	$con = new mysqli($host, $usuario, $senha, $db);

	if(mysqli_connect_errno()){
		exit("Erro ao conectar-se ao banco de dados: ".mysqli_connect_error());
	}
?>