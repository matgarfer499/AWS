<?php  

	$idCon = $_GET["id"]??null;

	if($idCon){
		require_once "tabla/contacto.php";

		$con = Contacto::getById($idCon);

		if($con) $con->delete();

		header("location: main.php");


	}
?>