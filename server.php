<?php
	/*
	Database
	Name: bd_data
	Table(1):
	tb_users
		user_id
		user_name
		user_dish
	*/

	session_start();

	$id = 0;
	$name = "";
	$dish = "";
	$doUpdate = false;
	
	$connection = mysqli_connect("localhost", "root", "", "bd_data");

	//Read
	$readQuery = "SELECT * FROM tb_users";
	$readResult = mysqli_query($connection, $readQuery);

	//Create
	if( isset($_POST["buttonCreate"]) ) {
		$name = $_POST["inputName"];
		$dish = $_POST["inputDish"];

		$createQuery = "INSERT INTO tb_users(user_name, user_dish) VALUES ('$name', '$dish')";
		mysqli_query($connection, $createQuery);
		$_SESSION["message"] = "Guardado Correctamente";
		header("location: index.php"); //Redirect to index.php
	}

	//Update
	if( isset($_POST["buttonUpdate"]) ) {
		$id = mysqli_real_escape_string($connection, $_POST["inputId"]);
		$name = mysqli_real_escape_string($connection, $_POST["inputName"]);
		$dish = mysqli_real_escape_string($connection, $_POST["inputDish"]);

		$updateQuery = "UPDATE tb_users SET user_name='$name', user_dish='$dish' WHERE user_id=$id";
		mysqli_query($connection, $updateQuery);
		$_SESSION["message"] = "Actualizado Correctamente";
		header("location: index.php"); //Redirect to index.php
	}

	//Delete
	if( isset($_GET["DeleteById"]) ) {
		$id = $_GET["DeleteById"];

		$deleteQuery = "DELETE FROM tb_users WHERE user_id=$id";
		mysqli_query($connection, $deleteQuery);
		$_SESSION["message"] = "Eliminado Correctamente";
		header("location: index.php"); //Redirect to index.php
	}
?>