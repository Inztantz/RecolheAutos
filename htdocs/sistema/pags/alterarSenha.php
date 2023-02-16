	<title>Alterar Senha - RECOLHE AUTOS</title>
	<?php if($_GET['hash'] == '') { 			
	echo "<script type='text/javascript'>"; 
	echo " setTimeout(function() { window.location.href='../sistema' }, 50);";
	echo "</script>"; } else {?>
	<?php verificarHash($con, $_GET['hash']);?>
	<div class="card bg-dark text-light border-dark">
		<div class="card-header bg-dark">Definir Nova Senha</div>
		<div class="card-body bg-dark">
			<form method="post" id="frmAlterarSenha">
				<h6 align="center">Digite sua nova senha</h6>
					<div class="input-group mb-3" id="exibirSenha" style="margin-top: 10px;">
						<input type="password" placeholder="Crie uma senha forte!" id="senha" name="senha" class="form-control bg-dark border-secondary text-white" required>
						<div class="input-group-append">
						<span class="input-group-text border-secondary bg-dark"><i id="eye" class="fa fa-eye-slash" aria-hidden="true"></i></span>
						</div>
					</div>
				<input type="submit" name="mudar" value="Mudar Senha" class="btn btn-outline-success btn-lg btn-block"><br>
			</form>
		</div>
	</div>
	<?php } ?>