<?php
function pesquisaUsuarios($con) {

	if(isset($_POST['pesquisa']))
	{
		echo '<script>document.getElementById("usuarios").style.display="none"; </script>';
		$pesquisa = htmlspecialchars("%{$_POST['pesquisa']}%");
		$sql = $con->prepare("SELECT * FROM usuario WHERE (nome LIKE ?) OR (email LIKE ?) OR (login LIKE ?) OR (usrnivel LIKE ?) ORDER BY usrnivel ASC");
		$sql->bind_param("ssss", $pesquisa, $pesquisa, $pesquisa, $pesquisa);
		$sql->execute();
		$resultado = $sql->get_result();
		$linhas = $resultado->num_rows;

		if($linhas == 0) 
		{ 				
			echo "
			<div class='card border-dark bg-dark text-white' style='margin-top: 10px; text-align: center;'>
			<div class='card-body bg-dark'>
			<h4>Você pesquisou por: ".$_POST['pesquisa']."</h4>"; 
			echo "<h6><i class='fa fa-search'></i> &nbsp; Nenhum usuário encontrado</h6>"; 
			echo "</div></div>";
			echo voltarUsuarios();
		}

		if($linhas > 0)
		{	
			echo usuarioQtd($linhas);

			while($dados = $resultado->fetch_array())
			{ 
				echo usuarios($dados);
			}

			echo voltarUsuarios();
		} 
	}

	if(isset($_GET['f']))
	{
		$filtro = filter_input(INPUT_GET, 'f', FILTER_SANITIZE_STRING);

		if($filtro == 'todos')
		{
			verificaNivelAdm();
			echo '<script>document.getElementById("usuarios").style.display="none"; </script>';
			$pesquisa = htmlspecialchars("%{$_POST['pesquisa']}%");
			$sql = $con->prepare("SELECT * FROM usuario ORDER BY usrnivel ASC");
			$sql->bind_param("s", $pesquisa);
			$sql->execute();
			$resultado = $sql->get_result();
			$linhas = $resultado->num_rows;

			if($linhas == 0) 
			{ 				
				echo "
				<div class='card border-dark bg-dark text-white' style='margin-top: 10px; text-align: center;'>
				<div class='card-body bg-dark'>
				<h4>Você pesquisou por: ".$_POST['pesquisa']."</h4>"; 
				echo "<h6><i class='fa fa-search'></i> &nbsp; Nenhum usuário encontrado</h6>"; 
				echo "</div></div>";
				echo voltarUsuarios();
			}

			if($linhas > 0)
			{
				echo usuarioQtdT($linhas);

				while($dados = $resultado->fetch_array())
				{
					echo usuarios($dados);
				}

				echo voltarUsuarios();
			}			
		}
	}
}
?>