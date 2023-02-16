	<title>Sair do Sistema - RECOLHE AUTOS</title>
	<?php echo verificaNivelVazio(); ?>
	<?php echo confirmaSair(); ?>
	<div class="card bg-dark border-dark text-white">
		<div class="card-header bg-dark">Tem certeza?</div>
		<div class="card-body bg-dark">
			<form method="post">
				<div class="accordion">
					<div class="card bg-dark">
						<div class="card-header">
							<h5 class="mb-0">
								<button type="submit" name="sair" class="btn btn-lg text-light" formmethod="post">SIM</button>
							</h5>
						</div>
					</div>
					<div class="card bg-dark">
						<div class="card-header">
							<h5 class="mb-0">
								<button type="button" class="btn btn-lg text-light" onclick="location.href='../sistema/login'">
									NÃO
								</button>
							</h5>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>