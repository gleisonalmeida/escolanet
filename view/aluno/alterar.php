<?php
	$con = conexao();
	
	$idAluno = $_GET["id"];
	
	$responsavel = $_SESSION["id_usuario"];
	
	$resultSerie = $con->query("select id, nome from aluno where id = $idAluno and id_responsavel = $responsavel");
	
	if(isset($_POST["postback"])){
		$nome = strip_tags($_POST["nome"]);
		
		if($con->query("update aluno set nome = '$nome' where id = $idAluno") == true)
			header("location:home.php?ida=ListarAlunos");
		else
			header("location:home.php?ida=AlterarAlunos&erro=".$con->error);
	}
	
	$linhaSerie = $resultSerie->fetch_row();
	
?>
<form action="" method="post">
	<input type="hidden" name="postback" value="1">
    
	<table class="tabelaForm" frame="box" rules="all" width="100%">
    	<tr class="tabelaLinhaTitulo">
        	<td colspan="7" align="center">
            	<b>Alterar Aluno</b>
            </td>
        </tr>
        <tr>
        	<td width="150">
            	Nome:
            </td>
            <td>
            	<input type="text" name="nome" value="<?php echo $linhaSerie[1] ?>" required size="50" maxlength="50" class="textoPadrao">
            </td>
        </tr>
        <tr>
        	<td></td>
        	<td>
            	<input type="submit" value="Salvar" class="botoes" />
                <input type="button" value="Cancelar" class="botoes" onClick="javascript:history.back(1);" />
            </td>
        </tr>
        <tr>
        	<td colspan="2">
            	<font color="#FF0000"><?php if(isset($_GET["erro"])) echo $_GET["erro"]; ?></font>
            </td>
        </tr>
    </table>
</form>