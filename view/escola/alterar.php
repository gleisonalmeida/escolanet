<?php
	$con = conexao();
	
	$id = $_GET["id"];
	
	$resultSerie = $con->query("select id, nome from escola where id = $id");
	
	if(isset($_POST["postback"])){
		$descricao = strip_tags($_POST["descricao"]);
		
		if($con->query("update escola set nome = '$descricao' where id = $id") == true)
			header("location:home.php?ida=index");
		else
			header("location:home.php?ida=alterar&erro=".$con->error);
	}
	
	$linhaSerie = $resultSerie->fetch_row();
	
?>
<form action="" method="post">
	<input type="hidden" name="postback" value="1">
    
	<table class="tabelaForm" frame="box" rules="all" width="100%">
    	<tr class="tabelaLinhaTitulo">
        	<td colspan="7" align="center">
            	<b>Alterar Série</b>
            </td>
        </tr>
        <tr>
        	<td width="150">
            	Descrição:
            </td>
            <td>
            	<input type="text" name="descricao" value="<?php echo $linhaSerie[1] ?>" required size="15" maxlength="20" class="textoPadrao">
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