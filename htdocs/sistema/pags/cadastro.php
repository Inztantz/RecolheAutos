	<title>Cadastro de Usuários - RECOLHE AUTOS</title>
	<?php echo verificaNivelCadastro(); ?>
	<?php echo Cadastro($con); ?>
	<div class="card bg-dark text-light border-dark">
		<div class="card-header bg-dark">
			<button class="btn text-light" onclick="location.href='../sistema/login'"><i class="fa fa-arrow-left"></i></button>
			Cadastro de Usuários
		</div>
		<div class="card-body bg-dark">
			<form method="post" id="frmCadastro">	
				<?php session_start(); ?>
				<?php if($_SESSION['usrnivel'] == 'Administrador') { echo'
				<div class="form-group">
				<label>Nível do Usuário</label>
				<select class="form-control border-secondary bg-dark text-white" id="usrnivel" name="usrnivel" required>
				<option>Administrador</option>
				<option>Cidadao</option>
				</select>
				</div>';
				}	else { echo'
				<select hidden="" class="form-control" id="usrnivel" name="usrnivel" required>
				<option>Cidadao</option>
				</select>';

			} ?>																			
			
			<div class="form-group">	
				<label>Nome Completo</label>
				<input type="text" class="form-control border-secondary bg-dark text-white" id="nome" name="nome" required>
			</div>
			
			<div class="form-group">
				<label>E-mail</label>
				<input type="email" class="form-control border-secondary bg-dark text-white"placeholder="Insira um E-mail válido" name="email" required>
			</div>

			<div class="form-group">
				<label>CPF</label>
				<input type="text" class="form-control border-secondary bg-dark" placeholder="Para controle de usuários" name="cpf" id="cpf" style="color: white;" required>
			</div>

			<div class="checkCPF"></div>

			<div class="form-group">
				<label>Login</label>
				<input type="text" class="form-control border-secondary bg-dark text-white" name="login" required>
			</div> 
			
			<div class="form-group">
				<label>Senha</label>
				<div class="input-group mb-3" id="exibirSenha">
					<input type="password" placeholder="Crie uma senha forte" id="senha" name="senha" class="form-control border-secondary bg-dark text-white" onkeyup="validarSenha()" required>
					<div class="input-group-append">
						<span class="input-group-text border-secondary bg-dark"><i id="eye" class="fa fa-eye-slash" aria-hidden="true"></i></span>
					</div>
				</div>	
				<div id="validarSenha"></div>
			</div>			
			
		</div>
		<div class="card-footer bg-dark">	
			<button type="submit" formmethod="post" class="btn btn-block btn-lg text-white" name="cadastrar" id="cad">CADASTRAR-SE</button>
		</form>
	</div>
	</div>