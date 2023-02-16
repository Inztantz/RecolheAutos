<?php

function usuarios($dados) {

	echo '<div class="card bg-dark border-dark text-light" style="margin-top: 5px;">';
	echo "<div class='card-header bg-dark border-dark'><h4>".$dados['usrnivel']."</h4></div>";
	echo '<div class="card-body bg-dark">';

	echo '
	<h6>Login</h6>
	'.$dados['login'].'<br><br>
	<h6>Nome</h6>
	'.$dados['nome'].'<br><br>
	<h6>E-mail</h6>
	'.$dados['email'].'<br><br>';

	echo '</div>';
	echo '</div>';		
}

function veiculos($dados) {

	echo '<div class="accordion" id="veiculo" style="margin: 0 auto; margin-top: 5px; max-width: 500px;">';
	echo '<div class="card bg-dark" style="border-radius: 5px;">';
	echo '<div class="card-header border-dark">';

	echo '<button class="btn btn-lg collapsed" type="button" data-toggle="collapse" data-target="#'.$dados['placa'].'" aria-controls="'.$dados['placa'].'">';

	if($dados['status'] == 0)
	{
		echo '<h4 class="text-light">'.$dados['nome'].'</h4><h5 class="text-secondary">Placa: '.$dados['placa'].'</h5>
		<h5 class="text-warning">Aguardando Remoção</h5>';
	}

	if($dados['status'] == 1)
	{
		echo '<h4 class="text-light">'.$dados['nome'].'</h4><h5 class="text-secondary">Placa: '.$dados['placa'].'</h5><h5 class="text-success"><i class="fa fa-check-circle"></i> Removido</h5>';
	}

	echo '</button>';
	echo '</div>';

	echo '<div id="'.$dados['placa'].'" class="collapse" data-parent="#veiculo" aria-expanded="false">';

	echo '<div class="card-body bg-dark text-light">';

	if($_SESSION['usrnivel'] == "Administrador")
	{
		echo '<h4 align="center" class="text-secondary">Denunciado por: '.$dados['usuario'].'</h4>';

		if($dados['status'] == 0)
		{
			if(($_GET['f']) == 'denunciou')
			{
				echo '
				<a class="btn btn-lg btn-block text-success" href="../sistema/veiculos&remove='.$dados['cd_veiculo'].'&pg=admin">
				<i class="fa fa-check-circle"></i> Remover 
				</a>';
			}
			else if(($_GET['f']) == 'todos')
			{
				echo '
				<a class="btn btn-lg btn-block text-success" href="../sistema/veiculos&remove='.$dados['cd_veiculo'].'&pg=todos">
				<i class="fa fa-check-circle"></i> Remover 
				</a>';
			}
			else 
			{
				echo '
				<a class="btn btn-lg btn-block text-success" href="../sistema/veiculos&remove='.$dados['cd_veiculo'].'">
				<i class="fa fa-check-circle"></i> Remover 
				</a>';				
			}
		}
	}

	echo '
	<h5>Marca</h5>
	'.$dados['marca'].'<br><br>
	<h5>CEP</h5>
	';

	if($dados['cep'] == '')
	{
		echo "CEP não informado";
	}
	else if($dados['cep'] != '')
	{
		echo $dados['cep'];
	}

	echo'<br><br>';

	echo '<h5>Endereço (Logradouro)</h5>
	'.$dados['endereco'].',
	'.$dados['numero'].'<br><br>';

	echo '<h5>Bairro</h5>
	'.$dados['bairro'].'<br><br>
	<h5>Cidade</h5>
	'.$dados['cidade'].',
	'.$dados['estado'].'<br><br>';	

	echo '</div>';
	echo '</div>';
	echo '</div>';
}

function usuarioQtd($linhas) {

	echo "
	<div class='card border-dark bg-dark text-white' style='margin-top: 10px; text-align: center;'>
	<div class='card-body bg-dark'>
	<h4>Você pesquisou por: &nbsp;".$_POST['pesquisa']."</h4>";

	if($linhas == 1)
	{
		echo "<h6><i class='fa fa-search'></i> &nbsp;".$linhas." usuário encontrado</h6>";
	}
	else if($linhas > 1)
	{
		echo "<h6><i class='fa fa-search'></i> &nbsp;".$linhas." usuários encontrados</h6>";
	}

	echo "</div></div>";
}

function usuarioQtdT($linhas) {

	echo "
	<div class='card border-dark bg-dark text-white' style='margin-top: 10px; text-align: center;'>
	<div class='card-body bg-dark'>";
	
	if($linhas == 1)
	{
		echo "<h4><i class='fa fa-search'></i> &nbsp;".$linhas." usuário</h4>";
	}
	else if($linhas > 1)
	{
		echo "<h4><i class='fa fa-search'></i> &nbsp;".$linhas." usuários</h4>";
	}

	echo "</div></div>"; 
}

function veiculoQtd($linhas) {

	echo "
	<div class='card border-dark bg-dark text-white' style='text-align: center;'>
	<div class='card-body'>
	<h4>Você pesquisou por: ".$_POST['pesquisa']."</h4>";

	if($linhas == 1)
	{
		echo "<h6><i style='margin-top: 10px;' class='fa fa-search'></i> &nbsp;".$linhas." veículo encontrado</h6>";
	}
	else if($linhas > 1)
	{
		echo "<h6><i class='fa fa-search'></i> &nbsp;".$linhas." veículos encontrados</h6>";
	}

	echo "</div></div>";
}

function veiculoQtdT($linhas) {

	echo "
	<div class='card border-dark bg-dark text-white' style='text-align: center;'>
	<div class='card-body'>";

	if($linhas == 1)
	{
		echo "<h6><i class='fa fa-search'></i> &nbsp;".$linhas." veículo foi denunciado</h6>";
	}

	if($linhas > 1)
	{
		echo "<h6><i class='fa fa-search'></i> &nbsp;".$linhas." veículos foram denunciados</h6>";
	}

	echo "</div></div>";
}

function veiculoQtdR($linhas) {

	echo "
	<div class='card border-dark bg-dark text-white' style='text-align: center;'>
	<div class='card-body'>";

	if($linhas == 1)
	{
		echo "<h6><i class='fa fa-search'></i> &nbsp;".$linhas." veículo foi removido</h6>";
	}

	if($linhas > 1)
	{
		echo "<h6><i class='fa fa-search'></i> &nbsp;".$linhas." veículos foram removidos</h6>";
	}

	echo "</div></div>";
}

function veiculoQtdNR($linhas) {

	echo "
	<div class='card border-dark bg-dark text-white' style='text-align: center;'>
	<div class='card-body'>";

	if($linhas == 1)
	{
		echo "<h6><i class='fa fa-search'></i> &nbsp;".$linhas." veículo não foi removido</h6>";				
	}

	if($linhas > 1)
	{
		echo "<h6><i class='fa fa-search'></i> &nbsp;".$linhas." veículos não foram removidos</h6>";
	}

	echo "</div></div>";
}

function veiculoQtdU($linhas) {

	echo "
	<div class='card border-dark bg-dark text-white' style='text-align: center;'>
	<div class='card-body'>
	<h4>Veículos denunciados por:<br>".$_GET['usuario']."</h4>";

	if($linhas == 1)
	{
		echo "<h6><i style='margin-top: 10px;' class='fa fa-search'></i> &nbsp;".$linhas." veículo encontrado</h6>";
	}
	else if($linhas > 1)
	{
		echo "<h6><i class='fa fa-search'></i> &nbsp;".$linhas." veículos encontrados</h6>";
	}

	echo "</div></div>";
}

function voltarUsuario()
{
	if($_SESSION['usrnivel'] == 'Administrador')
	{
		echo '
		<div class="card bg-dark" style="padding-top: 10px; margin-top: 5px; margin-bottom: 5px; text-align: center;">	
		<a class="btn btn-lg text-light" href="../sistema/admin">
		<i class="fa fa-user fa-2x"></i>
		<h6 style="margin-top: 15px;">Voltar - Área do Administrador</h6>
		</a>
		</div>';		
	}
	else if($_SESSION['usrnivel'] == 'Cidadao')
	{
		echo '
		<div class="card bg-dark" style="padding-top: 10px; margin-top: 5px; margin-bottom: 5px; text-align: center;">	
		<a class="btn btn-lg text-light" href="../sistema/cidadao">
		<i class="fa fa-user fa-2x"></i>
		<h6 style="margin-top: 15px;">Voltar - Área do Cidadão</h6>
		</a>
		</div>';	
	}
}

function voltar()
{
	echo '
	<div class="card bg-dark" style="padding-top: 10px; margin-top: 5px; margin-bottom: 5px; text-align: center;">	
	<a class="btn btn-lg text-light" href="../sistema/veiculos">
	<i class="fa fa-car fa-2x"></i>
	<h6 style="margin-top: 15px;">Voltar - Veículos Denunciados</h6>
	</a>
	</div>';
}

function voltarUsuarios()
{
	echo '
	<div class="card bg-dark" style="padding-top: 10px; margin-top: 5px; margin-bottom: 5px; text-align: center;">	
	<a class="btn btn-lg text-light" href="../sistema/usuarios">
	<i class="fa fa-user fa-2x"></i>
	<h6 style="margin-top: 15px;">Voltar - Usuários</h6>
	</a>
	</div>';
}

?>