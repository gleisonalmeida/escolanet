<?php
	$con = conexao();
	
	$idSerie = $_GET["id"];
		
		if($con->query("delete from serie where id = $idSerie") == true)
			header("location:home.php?ida=ListarSerie");
		else
			header("location:home.php?ida=ListarSerie");
?>