<?php
	$con = conexao();
	
	$responsavel = $_SESSION["id_usuario"];
	
	if(isset($_POST["postback"])){
		$nome = strip_tags($_POST["nome"]);
		
		if($con->query("insert into aluno (id_responsavel, nome) values ($responsavel, '$nome')") == true)
			header("location:home.php?ida=ListarAlunos");
		else
			header("location:home.php?ida=InserirAlunos&erro=".$con->error);
	}
	
?>
<form action="" method="post">
	<input type="hidden" name="postback" value="1">
    
	<table class="tabelaForm" frame="box" rules="all" width="100%">
    	<tr class="tabelaLinhaTitulo">
        	<td colspan="7" align="center">
            	<b>Novo Aluno</b>
            </td>
        </tr>
        <tr>
        	<td width="100">
            	Nome:
            </td>
            <td>
            	<input type="text" name="nome" value="" size="50" required maxlength="50" class="textoPadrao">
            </td>
        </tr>
        <tr>
        	<td></td>
        	<td>
            	<input type="submit" value="Cadastrar" class="botoes" />
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