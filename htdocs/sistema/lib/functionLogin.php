<?php
function Login($con) {

	if($_SESSION['usrnivel'] == "Administrador")
	{
		header('Location: ../sistema/admin');
	}

	if($_SESSION['usrnivel'] == "Cidadao")
	{
		header('Location: ../sistema/cidadao');
	}	

	if(isset($_POST['logar']))
	{
		if($_POST['login'] && $_POST['senha'] && $_POST['usrnivel'])
		{
			$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
			$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
			$nivel = filter_input(INPUT_POST, 'usrnivel', FILTER_SANITIZE_STRING);

			$sql = $con->query("SELECT * FROM usuario WHERE login='$login' AND usrnivel='$nivel' LIMIT 1");
			$contar = $sql->num_rows;

			if($contar > 0)
			{
				$log = $sql->fetch_assoc();

				if(password_verify($senha, $log['senha']))
				{
					$_SESSION['login'] = $log['login'];
					$_SESSION['senha'] = $log['senha'];
					$_SESSION['usrnivel'] = $log['usrnivel'];

					echo "<script type='text/javascript'>"; 
					echo "setTimeout(function() { $('#crdLogin').hide(); }, 50);";
					echo "</script>";

					echo '<div class="alert alert-success bg-success border-success text-white"><h4>Logado com sucesso!</h4> <h6>Redirecionando...</h6></div>';

					echo "<script type='text/javascript'>"; 

					if($_SESSION['usrnivel'] == 'Administrador')
					{
						echo "setTimeout(function() { window.location.href='../sistema/admin' }, 3500);";						
					}		
					else if($_SESSION['usrnivel'] == 'Cidadao')
					{
						echo "setTimeout(function() { window.location.href='../sistema/cidadao' }, 3500);";
					}

					echo "</script>";
				}
				else
				{
					echo '<div id="errolog" class="alert alert-danger bg-danger border-danger text-white">Senha Incorreta!</div>';
					echo "<script type='text/javascript'>"; 
					echo "	setTimeout(function() { $('#errolog').hide(); }, 4000);";
					echo "</script>";					
				}
			}
			else
			{
				echo '<div id="errolog" class="alert alert-danger bg-danger border-danger text-white">Usuário não cadastrado!</div>';
				echo "<script type='text/javascript'>"; 
				echo "	setTimeout(function() { $('#errolog').hide(); }, 4000);";
				echo "</script>";
			}

		}
		else
		{
			echo '<div id="errolog" class="alert alert-danger bg-danger border-danger text-white">Ocorreu um erro ao logar!</div>';
			echo "<script type='text/javascript'>"; 
			echo "	setTimeout(function() { $('#errolog').hide(); }, 4000);";
			echo "</script>";
		}
	}

}
?>