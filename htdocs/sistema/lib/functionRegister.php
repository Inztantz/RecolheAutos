<?php

function Cadastro($con){

	if(isset($_POST['cadastrar']))
	{
		$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

		$nome = $dados['nome'];
		$email = $dados['email'];
		$cpf = $dados['cpf'];
		$login = $dados['login'];
		$senha = $dados['senha'];

		$sql1 = $con->query("SELECT * FROM usuario WHERE login = '$login'");
		$sql2 = $con->query("SELECT * FROM usuario WHERE email = '$email'");
		$sql3 = $con->query("SELECT * FROM usuario WHERE cpf = '$cpf'");

		$contarlog = $sql1->num_rows;
		$contarmail = $sql2->num_rows;
		$contarcpf = $sql3->num_rows;

		if($contarlog > 0)
		{
			echo'<div id="existelog" class="alert alert-danger bg-danger border-danger text-white">Usuário existente!</div>';
			echo "<script type='text/javascript'>"; 
			echo "	setTimeout(function() {	$('#existelog').hide(); $('#nome').val('$nome'); $('#email').val('$email');
			$('#cpf').val('$cpf'); }, 5000);";
			echo "</script>";			
		}

		if($contarmail > 0)
		{
			echo'<div id="existemail" class="alert alert-danger bg-danger border-danger text-white">E-mail já cadastrado!</div>';
			echo "<script type='text/javascript'>"; 
			echo "	setTimeout(function() {	$('#existemail').hide(); $('#nome').val('$nome'); $('#cpf').val('$cpf'); 
			$('#login').val('$login');}, 5000);";
			echo "</script>";				
		}

		if($contarcpf > 0)
		{
			echo'<div id="existecpf" class="alert alert-danger bg-danger border-danger text-white">CPF já cadastrado!</div>';
			echo "<script type='text/javascript'>"; 
			echo "	setTimeout(function() {	$('#existecpf').hide(); $('#nome').val('$nome'); $('#email').val('$email');
			$('#login').val('$login');}, 5000);";
			echo "</script>";				
		}
		else 
		{
			$inserir = $con->query("INSERT INTO usuario (nome, email, cpf, login, senha, usrnivel) VALUES (
				'" .$dados['nome']. "',
				'" .$dados['email']. "',
				'" .$dados['cpf']. "',								
				'" .$dados['login']. "',
				'" .$dados['senha']. "',
				'" .$dados['usrnivel']. "'
			)");

			if(mysqli_insert_id($con))
			{
				echo '<div class="alert alert-success bg-success border-success text-white">Cadastrado com sucesso!</div>';
				echo "<script type='text/javascript'>"; 
				echo "	setTimeout(function() { window.location.href='../sistema/login' }, 3000);";
				echo "</script>";
			}
			else
			{
				echo '<div id="errocad" class="alert alert-danger bg-danger border-danger text-white">Não foi possível cadastrar!</div>';

				echo "<script type='text/javascript'>"; 
				echo "	setTimeout(function() { $('#errocad').hide(); }, 5000);";
				echo "</script>";
			}		
		}
	}
}
?>