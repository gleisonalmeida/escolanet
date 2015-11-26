<?php
	$con = conexao();
	
	$idEscola = $_GET["id"];
		
		if($con->query("delete from escola where id = $idEscola") == true)
			header("location:home.php?ida=index");
		else
			header("location:home.php?ida=index");
?>