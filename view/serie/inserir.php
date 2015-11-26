<?php
	$con = conexao();
	
	if(isset($_POST["postback"])){
		$descricao = strip_tags($_POST["descricao"]);
		
		if($con->query("insert into serie (descricao) values ('$descricao')") == true)
			header("location:home.php?ida=ListarSerie");
		else
			header("location:home.php?ida=InserirSerie&erro=".$con->error);
	}
	
?>
<form action="" method="post">
	<input type="hidden" name="postback" value="1">
    
	<table class="tabelaForm" frame="box" rules="all" width="100%">
    	<tr class="tabelaLinhaTitulo">
        	<td colspan="7" align="center">
            	<b>Nova Série</b>
            </td>
        </tr>
        <tr>
        	<td width="150">
            	Descrição:
            </td>
            <td>
            	<input type="text" name="descricao" value="" required size="15" maxlength="20" class="textoPadrao">
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