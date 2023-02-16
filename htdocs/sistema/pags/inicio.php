	<title>Página Inicial - RECOLHE AUTOS</title>	
	<div class="card bg-dark text-light border-dark">
		<div class="card-header bg-dark border-dark text-light">
			<h4 class="text-warning">Reporte Veículos Abandonados</h4>
			<h6 class="text-secondary">Seja bem-vindo à Recolhe Autos!</h6>
		</div>
		<div class="accordion">
			<div class="card bg-dark border-dark">
				<div class="card-header">
					<button class="btn btn-lg text-light" onclick="location.href='../sistema/login'">
						<?php  
						if($_SESSION['usrnivel'] == "Administrador"){ echo '<i class="fa fa-user fa-2x"></i><h6 style="margin-top: 15px;">Área do Administrador</h6>'; echo "<div class='text-secondary' style='font-size: 15px; font-weight:bold;'>Usuário: ".$_SESSION['login']."</div>"; }
						if($_SESSION['usrnivel'] == "Cidadao"){ echo '<i class="fa fa-user fa-2x"></i><h6 style="margin-top: 15px;">Área do Cidadão</h6>';
						echo "<div style='font-size: 15px; font-weight:bold;'>Usuário: ".$_SESSION['login']."</div>"; }
						if($_SESSION['usrnivel'] == ""){ echo '<i class="fa fa-sign-in-alt fa-2x"></i><h6 style="margin-top: 15px;">Acesso ao Sistema</h6>'; }
						?>	
					</button>
				</div>
			</div>
		</div>
		<div class="accordion">
			<div class="card bg-dark border-dark">
				<div class="card-header">
					<button class="btn btn-lg text-light" onclick="location.href='../sistema/manual'">
						<i class="fa fa-book fa-2x"></i><h6 style="margin-top: 15px;">Manual do Usuário</h6>
					</button>
				</div>
			</div>
		</div>
		<?php if(!$_SESSION['usrnivel']) { ?>
			<div class="accordion">
				<div class="card bg-dark border-dark">
					<div class="card-header">
						<button class="btn btn-lg text-light" onclick="location.href='../sistema/veiculos'">
							<i class="fa fa-search fa-2x"></i>&nbsp; <i class="fa fa-car fa-2x"></i><h6 style="margin-top: 15px;">Veículos Denunciados</h6>
						</button>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="accordion">
			<div class="card bg-dark border-dark">
				<div class="card-header">
					<button class="btn btn-lg text-light" onclick="location.href='../sistema/links'">
						<i class="fa fa-info-circle fa-2x"></i><h6 style="margin-top: 15px;">Links Úteis</h6>
					</button>
				</div>
			</div>
		</div>
	</div>
	<?php if($_SESSION['usrnivel']) { ?>
	<div class="card bg-dark" style="padding-top: 10px; margin-top: 5px; margin-bottom: 5px; text-align: center;">	
		<button class="btn btn-lg text-light" onclick="location.href='../sistema/sair'">
			<i class="fa fa-power-off fa-2x"></i>
			<h6 style="margin-top: 10px;">Sair do Sistema</h6>
		</button>
	</div>
	<?php } ?>