<?php 
	include("server.php");

	if( isset($_GET["UpdateById"]) ) {
		$id = $_GET["UpdateById"];
		$doUpdate = true;
		$userById = "SELECT * FROM tb_users WHERE user_id='$id'";
		$result = mysqli_query($connection, $userById);
		$tableView = mysqli_fetch_array($result);
		$id = $tableView["user_id"];
		$name = $tableView["user_name"];
		$dish = $tableView["user_dish"];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Platos Favoritos</title>
	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./estilos.css">
</head>
<body>
	<!-- **************** Inicio Header **************** -->
	<section class="d-flex justify-content-center">
		<div class="col-6 mt-4 mb-2 p-1 text-center font-weight-bold border rounded border-primary header">
			Platos Favoritos
		</div>
	</section>
	<!-- **************** Fin Header **************** -->


	<!-- **************** Inicio Aviso **************** -->	
	<?php if(isset($_SESSION["message"])) { ?>
		<section class="d-flex justify-content-center">
			<div class="mt-4 col-3 border-primary text-center mensaje">
				<p class="h5">
					<?php
						echo $_SESSION["message"];
						unset($_SESSION["message"]);
					?>
				</p>
			</div>
		</section>
	<?php } ?>
	<!-- **************** Fin Aviso **************** -->


	<!-- **************** Inicio Tabla **************** -->
	<section class="mt-4 d-flex justify-content-center">
		<div class="col-6 table-responsive">
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th class="text-center">Nombre</th>
			      <th class="text-center">Plato Favorito</th>
			      <th class="text-center" colspan="2">Acciones</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php while( $row = mysqli_fetch_array($readResult) ) { ?>
				  	<tr>
				      <td class="text-center">
				      	<?php echo $row["user_name"]; ?>
			      	  </td>
				      <td class="text-center">
				      	<?php echo $row["user_dish"]; ?>
				      </td>
				      <td class="text-center">
				      	<a href="index.php?UpdateById=<?php echo $row['user_id']; ?>">
				      		<button type="button" class="btn btn-success">Actualizar</button>
				      	</a>
				      	<a href="server.php?DeleteById=<?php echo $row['user_id']; ?>">
				      		<button type="button" class="btn btn-danger ml-2">Eliminar</button>
				      	</a>
				      </td>
				    </tr>
			  	<?php } ?>
			  </tbody>
			</table>
		</div>
	</section>
	<!-- **************** Fin Tabla **************** -->


	<!-- **************** Inicio Formulario **************** -->
	<section class="d-flex justify-content-center">
		<div class="col-6 mt-4 pl-5 pr-5 pt-4 pb-3 border rounded border-primary">
			<form method="post" action="server.php">
				<!-- Input Hidden Codigo -->
				<input type="hidden" name="inputId" value="<?php echo $id; ?>">
				<div class="form-group row">
					<label class="col-3" for="input1">Nombre</label>
					<input class="col-9 form-control" name="inputName" value="<?php echo $name; ?>" type="text" id="input1" placeholder="Escribe tu nombre.">
				</div>
				<div class="form-group row">
					<label class="col-3" for="input2">Plato Favorito</label>
					<input class="col-9 form-control" name="inputDish" value="<?php echo $dish; ?>" type="text" id="input2" placeholder="Escribe tu plato favorito.">
				</div>
				<?php if($doUpdate == false) { ?>
					<div class="d-flex justify-content-center">
						<button class="pl-5 pr-5 btn btn-primary" name="buttonCreate" type="submit">
							Grabar
						</button>
					</div>
				<?php } ?>
				<?php if($doUpdate == true) { ?>
					<div class="d-flex justify-content-center">
						<button class="pl-5 pr-5 btn btn-success" name="buttonUpdate" type="submit">
							Actualizar
						</button>
					</div>
				<?php } ?>
			</form>
		</div>
	</section>
	<!-- **************** Fin Formulario **************** -->


	<!-- **************** Inicio Footer **************** -->
	<section class="d-flex justify-content-center">
		<div class="col-6 mt-4 mb-4 text-center">
			Hecho con Bootstrap, PHP y MySQL por Miguel Fuertes
		</div>
	</section>
	<!-- **************** Fin Footer **************** -->


	<!-- JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</body>
</html>