<?php
	$con = conexao();
	
	$idTurma = $_GET["id"];
		
		if($con->query("delete from turma where id = $idTurma") == true)
			header("location:home.php?ida=ListarTurmas");
		else
			header("location:home.php?ida=ListarTurmas");
?>