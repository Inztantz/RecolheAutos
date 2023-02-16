<?php

function verificaNivelAdm() {

	if($_SESSION['usrnivel'] == "")
	{
		header('Location: ../sistema/login');
	}
	else if($_SESSION['usrnivel'] == "Cidadao")
	{
		header('Location: ../sistema/cidadao');
	}	
}

function verificaNivelCid() {

	if($_SESSION['usrnivel'] == "")
	{
		header('Location: ../sistema/login');
	}
	else if($_SESSION['usrnivel'] == "Administrador")
	{
		header('Location: ../sistema/admin');
	}
}

function verificaNivelCadastro() {

	if($_SESSION['usrnivel'] == "Cidadao")
	{
		header('Location: ../sistema/cidadao');
	}	
}

function verificaNivelVazio() {

	if($_SESSION['usrnivel'] == "")
	{
		header('Location: ../sistema/login');
	}	
}

function confirmaSair() {

	if(isset($_POST['sair']))
	{
		if(session_destroy())
		{
			echo "<script type='text/javascript'>"; 
			echo " setTimeout(function() { window.location.href='../sistema/' }, 50);";
			echo "</script>";
		}
		else
		{
			echo "<script> alert('Não foi possível sair');";
			echo " setTimeout(function() { window.location.href='../sistema/sair' }, 50);";
			echo "</script>";
		}
	}
}


function redireciona($dir) {
	echo "<meta http-equiv='refresh' content='3; url={$dir}'>";
}

?>