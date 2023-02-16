<?php
function Denunciar($con){

	if(isset($_POST['denunciar']))
	{
		$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		$usuario = $dados['usuario'];
		$nome = strtoupper($dados['nome']);
		$marca = strtoupper($dados['marca']);
		$cor = strtoupper($dados['cor']);
		$placa = $dados['placa'];
		$cep = $dados['cep'];
		$endereco = $dados['rua'];
		$numero = $dados['numero'];
		$bairro = $dados['bairro'];
		$cidade = $dados['cidade'];
		$estado = strtoupper($dados['uf']);
		$status = $dados['status'];

		$sql1 = $con->query("SELECT * FROM veiculo WHERE placa = '$placa'");

		$contar = $sql1->num_rows;

		if($contar > 0)
		{
			echo '<div id="existe" class="alert alert-warning bg-warning border-warning text-dark">Este veículo já foi denunciado!</div>';
			echo "<script type='text/javascript'>"; 
			echo "	setTimeout(function() {	window.location.href='../sistema/veiculos'}, 3000);";
			echo "</script>";			
		}

		else 
		{
			$inserir = $con->query("INSERT INTO veiculo (usuario, marca, nome, cor, placa, cep, endereco, numero, bairro, cidade, estado, status) VALUES (
				'" .$usuario. "',
				'" .$marca. "',
				'" .$nome. "',
				'" .$cor. "',
				'" .$placa. "',
				'" .$cep. "',
				'" .$endereco. "',
				'" .$numero. "',
				'" .$bairro. "',
				'" .$cidade. "',
				'" .$estado. "',
				'" .$status. "'
			)");

			if(mysqli_insert_id($con))
			{
				echo '<script>document.getElementById("denunciar").style.display="none"; </script>';
				echo '<div class="alert alert-success bg-success border-success text-white">Denunciado com sucesso!</div>';
				echo "<script type='text/javascript'>"; 
				echo "	setTimeout(function() { window.location.href='../sistema/login' }, 3000);";
				echo "</script>";
			}
			else
			{
				echo '<div id="errocad" class="alert alert-danger bg-danger border-danger text-white">Não foi possível denunciar!</div>';

				echo "<script type='text/javascript'>"; 
				echo "	setTimeout(function() { $('#errocad').hide(); }, 5000);";
				echo "</script>";
			}		
		}
	}
}
?>