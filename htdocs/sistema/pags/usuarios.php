	<title>Usuários - RECOLHE AUTOS</title>
	<?php echo verificaNivelAdm(); ?>
	<div class="card bg-dark border-dark text-white" id="usuarios">
		<div class="card-header bg-dark">
			<button class="btn text-light" onclick="location.href='../sistema/admin'"><i class="fa fa-arrow-left"></i></button>
			Usuários
		</div>
		<div class="card-body bg-dark">
			<form method="post">
				<input type="text" name="pesquisa" class="form-control bg-dark text-white border-secondary" placeholder="Pesquise por Nome, Login, Nivel ou E-mail" style="max-width: 500px;" required>
				<input type="submit" class="btn btn-block btn-outline-secondary" value="Pesquisar" style="margin-top: 10px;">
			</form>		
		</div>
		<div class="accordion">
			<div class="card bg-dark border-dark">
				<div class="card-header">
					<h5 class="mb-0">
						<button class="btn btn-lg text-light" onclick="location.href='../sistema/usuarios&f=todos'">
							Todos os Usuários Cadastrados<br><i class="fa fa-list-alt"></i> &nbsp;<i class="fa fa-user"></i>
						</button>
					</h5>
				</div>
			</div>
		</div>
	</div>
	<?php echo pesquisaUsuarios($con); ?>

