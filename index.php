<!DOCTYPE html>
<html>

<head>
	<title>Práctica 3 - Objetos PHP </title>
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
		integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

	<div class="container col col-md-12">
		<h3>Práctica 3 - Objetos PHP con base de datos</h3>

		<div class="row">

			<div class="col col-md-3">

				<div class="form-group" id="group-idpersona">
					<label><strong>Personas:</strong></label>
					<?php
                        require_once("Catalogos.php");
                        $personas = Catalogos::personas();
                        ?>
					<!-- CAMBIAR POR INPUT -->

					<select id="personas" class="form-control" multiple size="10">

						<?php for ($i = 0; $i < count($personas); $i++) { ?>
						<option
							value="<?= $personas[$i]->get_idpersona() ?>">
							<?= $personas[$i]->get_nombre() ?>
							<?= $personas[$i]->get_apellidos() ?>
						</option>
						<?php } ?>

					</select>

				</div>
				<button type="button" class="btn btn-success" id="btn-enviar"><I class="fas fa-paper-plane fa-2x"></I>
					Enviar</button>
			</div>

			<div class="col col-md-9">
				<div class="card" style="height: 550px !important;">
					<div class="card-header bg-secondary text-white"><strong>Resultado de la práctica</strong></div>
					<div class="card-body">
						<div class="row" id="resultado">
							Aquí se muestran los objetos...</div>
					</div>
				</div>
			</div>

		</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
		integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
		integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
	</script>

	<script type="text/javascript" src="./js/practica3.js"></script>
</body>

</html>