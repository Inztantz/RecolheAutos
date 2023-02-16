	<title>Denunciar Veículos - RECOLHE AUTOS</title>	
	<?php echo verificaNivelVazio(); ?>
	<?php echo Denunciar($con); ?>
	<div class="card bg-dark text-light border-dark" id="denunciar">
		<div class="card-header bg-dark">
			<button class="btn text-light" onclick="location.href='../sistema/login'"><i class="fa fa-arrow-left"></i></button>
			Denunciar Veículos
		</div>
		<div class="card-body bg-dark">
			<form method="post" id="frmDenunciar">
				<?php session_start(); ?>
				<?php echo '<input type="text" hidden="" name="usuario" value="'.$_SESSION['login'].'">';?>	
				<input type="text" hidden="" name="status" value="0">

				<h6>Nome do Veículo</h6>
				<input type="text" id="veiculo" name="nome" style="text-transform: uppercase;" class="form-control border-secondary bg-dark text-white" required ><br>

				<h6>Marca (Fabricante)</h6>
				<select class="form-control bg-dark border-secondary text-light" id="marca" name="marca" required>
					<option value="" selected disabled hidden>Selecionar Marca</option>
					<option>FORD</option>
					<option>VOLKSWAGEN</option>
					<option>FIAT</option>
					<option>CHEVROLET</option>
					<option>TOYOTA</option>
					<option>RENAULT</option>
					<option>PEUGEOT</option>
					<option>HYUNDAI</option>
					<option>JEEP</option>
					<option>CHERY</option>
					<option>MITSUBISHI</option>
					<option>NISSAN</option>
					<option>HONDA</option>
					<option>CITROEN</option>
					<option>MINI</option>
					<option>JAC</option>
				</select><br>
				<!--
				<input type="text" id="marca" name="marca" style="text-transform: uppercase;" class="form-control border-secondary bg-dark text-white" placeholder="Ford, Volkswagen, Fiat" style="width: 200px;" required><br>-->

				<h6>Cor do Veículo</h6>
				<select class="form-control bg-dark border-secondary text-light" id="cor" name="cor" required>
					<option value="" selected disabled hidden>Selecionar Cor</option>
					<option>PRATA</option>
					<option>CINZA</option>
					<option>BRANCO</option>
					<option>PRETO</option>
					<option>VERMELHO</option>				
					<option>AZUL</option>
					<option>AMARELO</option>				
					<option>LARANJA</option>
					<option>VERDE</option>
				</select><br>
				<!--
				<input type="text" id="cor" name="cor" style="text-transform: uppercase;" class="form-control border-secondary bg-dark text-white" style="margin-right: 50px;" required><br>-->

				<h6>Placa</h6>
				<input type="text" id="placa" name="placa" class="form-control border-secondary bg-dark text-white" style="width: 120px;" required><br>

				<h6>Selecione uma opção:</h6>
				<label><input type="radio" name="opt" value="Nao"> Localizar por CEP</label><br>
				<label><input type="radio" name="opt" value="Sim"> Inserir Endereço (Sem CEP)</label><br><br>

				<div id="insereCEP" style="display: none;">
					<h6>CEP:</h6>
					<input name="cep" type="text" class="form-control border-secondary bg-dark text-white" id="cep" size="10" maxlength="9" style="width: 120px;"><br>
					<div id="errocep"></div>
				</div>

				<div id="camposExtras" style="display: none;">				
					<label>Endereço (Logradouro)</label>
					<input name="rua" type="text" class="form-control border-secondary bg-dark text-white" id="rua" size="60" maxlength="100" required><br>
					<label>Altura do N°</label>
					<input name="numero" type="text" class="form-control border-secondary bg-dark text-white" id="numero" size="10" maxlength="5" style="width: 80px;"><br>
					<label>Bairro</label>
					<input name="bairro" type="text" class="form-control border-secondary bg-dark text-white" id="bairro" size="40" maxlength="50" required><br>
					<label>Cidade</label>
					<input name="cidade" type="text" class="form-control border-secondary bg-dark text-white" id="cidade" size="40" maxlength="80" required><br>
					<label>Estado (Ex: SP, RJ, MS etc.)</label>
					<input name="uf" type="text" class="form-control border-secondary bg-dark text-white" id="uf" size="2" maxlength="2" style="width: 50px;" required><br>
				</div>

			</div>
			<div class="card-footer bg-dark">
				<button type="submit" formmethod="post" class="btn btn-block btn-lg text-white" name="denunciar">ENVIAR DADOS</button>
			</form> 
		</div>
	</div>