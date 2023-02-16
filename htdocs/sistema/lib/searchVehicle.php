<?php
function pesquisaVeiculos($con) {

	if(isset($_POST['pesquisa']))
	{
		echo '<script>document.getElementById("veiculos").style.display="none"; </script>';
		$pesquisa = htmlspecialchars("%{$_POST['pesquisa']}%");
		$sql = $con->prepare("SELECT * FROM veiculo WHERE (nome LIKE ?)
			OR (marca LIKE ?)
			OR (cor LIKE ?)
			OR (placa LIKE ?)
			OR (usuario LIKE ?)
			OR (cep LIKE ?)
			OR (endereco LIKE ?)
			OR (cidade LIKE ?)
			ORDER BY nome ASC");
		$sql->bind_param("ssssssss", $pesquisa, $pesquisa, $pesquisa, $pesquisa, $pesquisa, $pesquisa, $pesquisa, $pesquisa);
		$sql->execute();
		$resultado = $sql->get_result();
		$linhas = $resultado->num_rows;

		if($linhas == 0) 
		{
			echo "
			<div class='card border-dark bg-dark text-white' style='text-align: center;'>
			<div class='card-body'>
			<h4>Você pesquisou por: ".$_POST['pesquisa']."</h4>";               
			echo "<h4><i class='fa fa-search'></i> &nbsp; Nenhum veículo encontrado<br></h4>";
			echo "</div></div>";
			echo voltar();
		} 

		if($linhas > 0)
		{
			echo veiculoQtd($linhas);

			while($dados = $resultado->fetch_array())
			{
				echo veiculos($dados);
			}

			echo '</div>';
			echo voltar();
		}
	}

	if(isset($_GET['f']))
	{
		$filtro = filter_input(INPUT_GET, 'f', FILTER_SANITIZE_STRING);

		if($filtro == 'removidos')
		{
			echo '<script>document.getElementById("veiculos").style.display="none"; </script>';
			$pesquisa = htmlspecialchars("%{$_POST['pesquisa']}%");
			$sql = $con->prepare("SELECT * FROM veiculo WHERE status = '1' ORDER BY nome ASC");
			$sql->bind_param("sssss", $pesquisa, $pesquisa, $pesquisa, $pesquisa, $pesquisa);
			$sql->execute();
			$resultado = $sql->get_result();
			$linhas = $resultado->num_rows;

			if($linhas == 0) 
			{
				echo "
				<div class='card border-dark bg-dark text-white' style='text-align: center;'>
				<div class='card-body'>";              
				echo "<h4><i class='fa fa-search'></i> &nbsp; Nenhum veículo encontrado<br></h4>";
				echo "</div></div>";
				echo voltar();
			} 

			if($linhas > 0)
			{
				echo veiculoQtdR($linhas);

				while($dados = $resultado->fetch_array())
				{
					echo veiculos($dados);
				}

				echo '</div>';
				echo voltar();
			}
		}
		else if($filtro == 'nremovidos')
		{
			echo '<script>document.getElementById("veiculos").style.display="none"; </script>';
			$pesquisa = htmlspecialchars("%{$_POST['pesquisa']}%");
			$sql = $con->prepare("SELECT * FROM veiculo WHERE status = '0' ORDER BY nome ASC");
			$sql->bind_param("sssss", $pesquisa, $pesquisa, $pesquisa, $pesquisa, $pesquisa);
			$sql->execute();
			$resultado = $sql->get_result();
			$linhas = $resultado->num_rows;

			if($linhas == 0) 
			{
				echo "
				<div class='card border-dark bg-dark text-white' style='text-align: center;'>
				<div class='card-body'>";              
				echo "<h4><i class='fa fa-search'></i> &nbsp; Nenhum veículo encontrado<br></h4>";
				echo "</div></div>";
				echo voltar();
			} 

			if($linhas > 0)
			{
				echo veiculoQtdNR($linhas);

				while($dados = $resultado->fetch_array())
				{
					echo veiculos($dados);
				}

				echo '</div>';
				echo voltar();
			}
		}
		else if($filtro == 'todos')
		{
			echo '<script>document.getElementById("veiculos").style.display="none"; </script>';
			$pesquisa = htmlspecialchars("%{$_POST['pesquisa']}%");
			$sql = $con->prepare("SELECT * FROM veiculo ORDER BY status ASC");
			$sql->execute();
			$resultado = $sql->get_result();
			$linhas = $resultado->num_rows;

			if($linhas == 0) 
			{
				echo "
				<div class='card border-dark bg-dark text-white' style='text-align: center;'>
				<div class='card-body'>";              
				echo "<h4><i class='fa fa-search'></i> &nbsp; Nenhum veículo encontrado<br></h4>";
				echo "</div></div>";
				echo voltar();
			} 

			if($linhas > 0)
			{
				echo veiculoQtdT($linhas);

				while($dados = $resultado->fetch_array())
				{
					echo veiculos($dados);
				}

				echo '</div>';
				echo voltar();
			}
		}
		else if($filtro == 'denunciou')
		{
			verificaNivelVazio();
			echo '<script>document.getElementById("veiculos").style.display="none"; </script>';

			$usuario = filter_input(INPUT_GET, 'usuario', FILTER_SANITIZE_STRING);
			$sql = $con->query("SELECT * FROM veiculo WHERE usuario = '$usuario'");
			$linhas = $sql->num_rows;

			if($linhas == 0) 
			{
				echo "
				<div class='card border-dark bg-dark text-white' style='text-align: center;'>
				<div class='card-body'>";              
				echo "<h4><i class='fa fa-search'></i> &nbsp; Nenhum veículo encontrado<br></h4>";
				echo "</div></div>";
				echo voltar();
			} 

			if($linhas > 0)
			{
				echo veiculoQtdU($linhas);

				while($dados = $sql->fetch_array())
				{					
					echo veiculos($dados);	
				}

				echo '</div>';
				echo voltarUsuario();
			}
		}
	}

	if(isset($_GET['remove'])) 
	{
		verificaNivelAdm();

		echo '<script>document.getElementById("veiculos").style.display="none"; </script>';

		$cod = filter_input(INPUT_GET, 'remove', FILTER_SANITIZE_NUMBER_INT);

		if($cod)
		{
			if(isset($_GET['a']) == 'sim')
			{
				$sql = $con->query("UPDATE veiculo SET status = '1' WHERE cd_veiculo = '$cod'");

				if(mysqli_affected_rows($con))
				{
					echo '<script>document.getElementById("msg").style.display="none"; </script>';
					echo '<div class="alert alert-success bg-success border-success text-white">Veículo removido com sucesso!</div>';
					echo "<script type='text/javascript'>"; 
					echo "	setTimeout(function() { window.location.href='../sistema/veiculos&f=removidos' }, 3000);";
					echo "</script>";
				}
				else
				{
					echo '<script>document.getElementById("msg").style.display="none"; </script>';
					echo '<div class="alert alert-success bg-success border-success text-white">Não foi possível remover o veículo!</div>';
					echo "<script type='text/javascript'>"; 
					echo "	setTimeout(function() { window.location.href='../sistema/veiculos' }, 3000);";
					echo "</script>";					
				}
			}

			echo '
			<div class="card bg-dark border-dark text-white" id="msg">
			<div class="card-header bg-dark">Tem certeza?</div>
			<div class="card-body bg-dark">
			<div class="accordion">
			<div class="card bg-dark">
			<div class="card-header">
			<h5 class="mb-0">
			<a href="../sistema/veiculos&remove='.$cod.'&a=sim" class="btn btn-lg text-light">SIM</a>
			</h5>
			</div>
			</div>
			</div>
			<div class="accordion">
			<div class="card bg-dark">
			<div class="card-header">
			<h5 class="mb-0">';

			if($_GET['pg'] == 'admin')
			{
				echo '<a href="../sistema/veiculos&f=denunciou&usuario='.$_SESSION['login'].'" class="btn btn-lg text-light">NÃO</a>';
			}
			else if($_GET['pg'] == 'todos')
			{
				echo '<a href="../sistema/veiculos&f=todos" class="btn btn-lg text-light">NÃO</a>';
			}
			else
			{
				echo '<a href="../sistema/veiculos&f=nremovidos" class="btn btn-lg text-light">NÃO</a>';
			}

			echo'
			</h5>
			</div>
			</div>
			</div>
			</div>
			</div>';
		}
	}
}
?>