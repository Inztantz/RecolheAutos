	<title>Recuperar Senha - RECOLHE AUTOS</title>
	<?php echo verificarEmail($con); ?>
	<div class="card bg-dark border-dark text-white">
		<div class="card-header bg-dark border-dark">
			<button class="btn text-light" onclick="location.href='../sistema/login'"><i class="fa fa-arrow-left"></i></button>
			Recuperar Senha
		</div>
		<div class="card-body bg-dark">
			<form method="post">
				<div class="form-group">
					<h6 class="text-secondary" style="text-align: center; margin-bottom: 15px;">Aviso: apenas e-mails validos serão aceitos</h6>
					<input type="email" name="email" placeholder="Insira o e-mail cadastrado em sua conta" class="form-control bg-dark text-white border-secondary" required>
					<input type="submit" name="enviar" value="Enviar" class="btn btn-outline-secondary btn-lg btn-block" style="margin-top: 10px;">
				</div>
				<div class="form-group">
					<p class="text-secondary" style="text-align: center; font-size: 12px;">Após clicar em enviar você receberá um link em seu e-mail para alterar a senha</p>
				</div>
			</form>		
		</div>
		<div class="card-footer bg-dark text-light border-dark"><h6>Lembre-se de checar sua caixa de Spam!</h6></div>
	</div>
