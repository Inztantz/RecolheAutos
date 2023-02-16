	<title>Veículos Denunciados - RECOLHE AUTOS</title>
	<div class="card bg-dark border-dark text-white" id="veiculos">
	    <div class="card-header bg-dark">
	    <?php if($_SESSION['usrnivel']) { ?>
	        <button class="btn text-light" onclick="location.href='../sistema/login'"><i class="fa fa-arrow-left"></i></button>
	    <?php } else { ?>
	        <button class="btn text-light" onclick="location.href='../sistema'"><i class="fa fa-arrow-left"></i></button>
	    <?php } ?>
	        Veículos Denunciados
	    </div>
	    <div class="card-body bg-dark">
	        <form method="post">
	            <input type="text" name="pesquisa" class="form-control bg-dark text-white border-secondary" placeholder="Pesquise por Nome, Marca, Cor e Placa / Endereço ou CEP" style="max-width: 500px;" required>
	            <input type="submit" class="btn btn-block btn-outline-secondary" style="margin-top: 10px;" value="Pesquisar">
	        </form>
	    </div>
		<div class="accordion">
			<div class="card bg-dark border-dark">
				<div class="card-header border-dark">
					<h5 class="mb-0">
						<button class="btn btn-lg text-light" onclick="location.href='../sistema/veiculos&f=removidos'">
							Removidos<br><i class="fa fa-check-circle"></i> &nbsp;<i class="fa fa-car"></i>
						</button>
					</h5>
				</div>
			</div>
		</div>
		<div class="accordion">
			<div class="card bg-dark border-dark">
				<div class="card-header border-dark">
					<h5 class="mb-0">
						<button class="btn btn-lg text-light" onclick="location.href='../sistema/veiculos&f=nremovidos'">
							Não Removidos<br><i class="fa fa-ban"></i> &nbsp;<i class="fa fa-car"></i>
						</button>
					</h5>
				</div>
			</div>
		</div>
		<div class="accordion">
			<div class="card bg-dark border-dark">
				<div class="card-header border-dark">
					<h5 class="mb-0">
						<button class="btn btn-lg text-light" onclick="location.href='../sistema/veiculos&f=todos'">
							Todos os Veículos Denunciados<br><i class="fa fa-list-alt"></i> &nbsp;<i class="fa fa-car"></i>
						</button>
					</h5>
				</div>
			</div>
		</div>
	</div><?php echo pesquisaVeiculos($con); ?>
	

