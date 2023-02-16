<?php
function verificarEmail($con) {

	if(isset($_POST['enviar']))
	{
		if($_POST['email'])
		{
			$email = addslashes($_POST['email']);
			$sql = $con->prepare("SELECT * FROM usuario WHERE email = ? LIMIT 1");
			$sql->bind_param("s", $email);
			$sql->execute();
			$get = $sql->get_result();
			$total = $get->num_rows;

			if($total > 0)
			{
				$dados = $get->fetch_assoc();
				adicionarRecuperacao($con, $email);
			}
			else
			{
				echo'<br><div id="errolog" class="alert alert-danger bg-danger border-danger text-white">E-mail não cadastrado!</div>';
				echo "<script type='text/javascript'>"; 
				echo "	setTimeout(function() { $('#errolog').hide(); }, 4000);";
				echo "</script>";
			}
		}
	}
}

function adicionarRecuperacao($con, $email) {

	$hash = md5(rand());
	$sql = $con->prepare("INSERT INTO solicita_redefinir (email, hash) VALUES (?, ?)");
	$sql->bind_param("ss", $email, $hash);
	$sql->execute();

	if($sql->affected_rows > 0)
	{
		enviarEmail($con, $email, $hash);
	}
}

function enviarEmail($con, $email, $hash) {

	require 'PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->isHTML(true);
	$mail->Charset = 'UTF-8';
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->Username = 'usuario';
	$mail->Password = 'senha';
	$mail->setFrom('emaildeenvio', 'Suporte Recolhe Autos');
	$mail->AddAddress($email);
	$mail->FromName = 'Suporte Recolhe Autos';
	$mail->Subject = 'Recuperar Senha - Recolhe Autos';
	$mail->Body = "<html><head>
	<h2>Olá, você solicitou uma recuperação de senha?</h2>
	<hr>
	<h3>Para alterar sua senha, acesse este link: </h3>
	<p><a href='".sitedir."alterarSenha&hash=".$hash."'>".sitedir."alterarSenha&hash=".$hash."</a>
	<hr>
	<h5>Não foi você quem solicitou? Ignore este email, porém alguém tentou alterar sua senha em nosso site.</h5>
	<hr>
	Atenciosamente,<br>
	Suporte Recolhe Autos.
	</head></html>";

	if($mail->Send())
	{
		echo "<div class='alert alert-success bg-success border-success text-white'>E-mail enviado com sucesso!</div>";
		echo "<script type='text/javascript'>"; 
		echo " setTimeout(function() { window.location.href='../sistema/login' }, 4000);";
		echo "</script>";
	}
	else
	{
		echo "<div class='alert alert-danger bg-danger border-danger text-white'>Não foi possível enviar o E-mail<br> Tente Novamente</div>";
	}


}

function verificarHash($con, $hash){

	$sql = $con->prepare("SELECT * FROM solicita_redefinir WHERE hash = ? AND status = 0");
	$sql->bind_param("s", $hash);
	$sql->execute();
	$get = $sql->get_result();
	$total = $get->num_rows;

	if($total > 0)
	{
		if(isset($_POST['mudar']))
		{
			$nsenha = addslashes(password_hash($_POST['senha'], PASSWORD_DEFAULT));

			$dados = $get->fetch_assoc();
			atualizarSenha($con, $dados['email'], $nsenha);
			deletarHash($con, $dados['email']);
			echo "<div class='alert alert-success bg-success border-success text-white'>Senha alterada com sucesso!</div>";
			echo "<script type='text/javascript'>"; 
			echo " setTimeout(function() { window.location.href='../sistema/login' }, 4000);";
			echo "</script>";
		}
	}
	else
	{
		echo "<div class='alert alert-danger bg-danger border-danger text-white'>Hash inválida</div>";
		echo "<script type='text/javascript'>"; 
		echo " setTimeout(function() { window.location.href='../sistema/login' }, 4000);";
		echo "</script>";
	}
}

function atualizarSenha($con, $email, $senha) {

	$sql = $con->prepare("UPDATE usuario SET senha = ? WHERE email = ?");
	$sql->bind_param("ss", $senha, $email);
	$sql->execute();

	if($sql->affected_rows > 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function deletarHash($con, $email) {

	$sql = $con->prepare("DELETE FROM solicita_redefinir WHERE email = ?");
	$sql->bind_param("s", $email);
	$sql->execute();

	if($sql->affected_rows > 0)
	{
		return true;
	}
	else
	{
		echo $con->error;
	}
}
?>