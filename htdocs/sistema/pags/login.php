	<title>Acesso ao Sistema - RECOLHE AUTOS</title>
	<?php echo Login($con); ?>
	<div class="card bg-dark text-light border-dark" id="crdLogin">
		<div class="card-header bg-dark border-dark">
			<button class="btn text-light" onclick="location.href='../sistema'"><i class="fa fa-arrow-left"></i></button>
			Acesso ao Sistema
		</div>
		<div class="card-body bg-dark">
			<form method="post" id="frmLogin">
				<div class="form-group">
					<label>Nível</label>
					<select class="form-control bg-dark border-secondary text-light" name="usrnivel" required>
						<option selected>Cidadao</option>
						<option>Administrador</option>
					</select>
				</div>

				<div class="form-group">
					<label>Login</label><br>
					<input type="text" class="form-control border-secondary bg-dark text-light" name="login" required>
				</div>

				<div class="form-group">
					<label>Senha</label>		
					<div class="input-group mb-3" id="exibirSenha">
						<input type="password" class="form-control border-secondary bg-dark text-light" name="senha" required>
						<div class="input-group-append"><span class="input-group-text form-control border-secondary bg-dark text-light"><i id="eye" class="fa fa-eye-slash" aria-hidden="true"></i></span></div>
					</div>
				</div>

				<button type="submit" formmethod="post" class="btn btn-block btn-lg text-white" name="logar">
					<i class="fa fa-sign-in-alt fa-2x"></i><h6>Logar</h6>
				</button>

			</form>	
		</div>
		<div class="card-footer bg-dark border-dark">
			<button class="btn text-secondary" onclick="location.href='../sistema/recuperarSenha'" style="font-size: 15px; margin-left: 20px;"><h6>Esqueceu sua Senha?</h6></button>
			<button class="btn text-secondary" style="font-size: 15px;" onclick="location.href='../sistema/cadastro'"><h6>Não é cadastrado? Clique aqui</h6></button>
		</div>
	</div>
