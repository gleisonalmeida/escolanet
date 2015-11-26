<?php
	$con = conexao();
	
	$idAluno = $_GET["id"];
		
		if($con->query("delete from aluno where id = $idAluno") == true)
			header("location:home.php?ida=ListarAlunos");
		else
			header("location:home.php?ida=ListarAlunos");
?>