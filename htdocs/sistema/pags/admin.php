<title>Administrador - RECOLHE AUTOS</title>
<?php echo verificaNivelAdm(); $usuario = $_SESSION['login'];?>
<div class="card bg-dark text-light border-dark">
	<div class="card-header bg-dark border-dark">
		<h4 class="text-primary" style="margin-top: 10px; margin-bottom: 15px;">Área do Administrador</h4>
		<h6 class="text-secondary">Olá <?php echo $usuario ?> seja bem-vindo!</h6>
	</div>
</div>
<div class="card bg-dark text-light" style="padding-top: 10px; margin-top: 5px; margin-bottom: 5px; text-align: center;">
	<div class="accordion">
		<div class="card bg-dark border-dark">
			<div class="card-header">
				<button class="btn btn-lg text-light" onclick="location.href='../sistema/cadastro'">
					<i class="fa fa-edit fa-2x"></i> &nbsp;<i class="fa fa-user-tie fa-2x"></i>
					<h6 style="margin-top: 15px;">Cadastrar Administrador</h6>
				</button>
			</div>
		</div>
	</div>
	<div class="accordion">
		<div class="card bg-dark border-dark">
			<div class="card-header">
				<button class="btn btn-lg text-light" onclick="location.href='../sistema/denunciar'">
					<i class="fa fa-edit fa-2x"></i> &nbsp;<i class="fa fa-car fa-2x"></i>
					<h6 style="margin-top: 15px;">Denunciar Veículos</h6>
				</button>
			</div>
		</div>
	</div>
	<div class="accordion">
		<div class="card bg-dark border-dark">
			<div class="card-header">
				<button class="btn btn-lg text-light" onclick="location.href='../sistema/veiculos'">
					<i class="fa fa-search fa-2x"></i>&nbsp; <i class="fa fa-car fa-2x"></i>
					<h6 style="margin-top: 15px;">Veículos Denunciados</h6>
				</button>
			</div>
		</div>
	</div>
	<div class="accordion">
		<div class="card bg-dark border-dark">
			<div class="card-header">
				<button class="btn btn-lg text-light" onclick="location.href='../sistema/veiculos&f=denunciou&usuario=<?php echo $usuario ?>'">
					<i class="fa fa-user fa-2x"></i>&nbsp; <i class="fa fa-car fa-2x"></i>
					<h6 style="margin-top: 15px;">Denunciados por <?php echo $usuario ?></h6>
				</button>
			</div>
		</div>
	</div>
	<div class="accordion">
		<div class="card bg-dark border-dark">
			<div class="card-header">
				<button class="btn btn-lg text-light" onclick="location.href='../sistema/usuarios'">
					<i class="fa fa-user fa-2x"></i>
					<h6 style="margin-top: 15px;">Usuários Cadastrados</h6>
				</button>
			</div>
		</div>
	</div>
</div>
<div class="card bg-dark" style="padding-top: 10px; margin-top: 5px; margin-bottom: 5px; text-align: center;">	
	<button class="btn btn-lg text-light" onclick="location.href='../sistema'">
		<i class="fa fa-home fa-2x"></i>
		<h6 style="margin-top: 15px;">Voltar à Página Inicial</h6>
	</button>
</div>
<div class="card bg-dark" style="padding-top: 10px; margin-top: 5px; margin-bottom: 5px; text-align: center;">	
	<button class="btn btn-lg text-light" onclick="location.href='../sistema/sair'">
		<i class="fa fa-power-off fa-2x"></i>
		<h6 style="margin-top: 10px;">Sair do Sistema</h6>
	</button>
</div>