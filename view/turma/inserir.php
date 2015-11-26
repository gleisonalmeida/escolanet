<?php
	$con = conexao();
	
	$idUsuario = $_SESSION["id_usuario"];
	
	//$resultEscola = $con->query("select id, nome from escola where id = (select id_escola from usuario where id = $idUsuario)");
	$resultEscola = $con->query("select id, nome from escola order by nome");
		
	$resultSerie = $con->query("select id, descricao from serie order by descricao");
	
	if(isset($_POST["postback"])){
		$escola = $_POST["escola"];
		$serie = $_POST["serie"];
		$codigo = strtoupper(strip_tags($_POST["codigo"]));
		$vagas = strip_tags($_POST["vagas"]);
		$data_abertura = strip_tags($_POST["data_abertura"]);
		$data_encerramento = strip_tags($_POST["data_encerramento"]);
		
		if($con->query("insert into turma (id_escola, id_serie, codigo, vagas, data_abertura, data_encerramento) values ($escola, $serie, '$codigo', $vagas, '$data_abertura','$data_encerramento')") == true)
			header("location:home.php?ida=356a192b7913b04c54574d18c28d46e6395428ab");
		else
			header("location:home.php?ida=IserirTurmas&erro=".$con->error);
	}
	
?>
<form action="" method="post" name="turma" onsubmit="return checarDatas()">
	<input type="hidden" name="postback" value="1">
    
	<table class="tabelaForm" frame="box" rules="all" width="100%">
    	<tr class="tabelaLinhaTitulo">
        	<td colspan="7" align="center">
            	<b>Nova Turma</b>
            </td>
        </tr>
		<tr>
        	<td width="170">
            	Escola:
            </td>
            <td>
            	<?php //if($linha = $resultEscola->fetch_row()) echo $linha[1]; ?>
                <!--<input type="hidden" name="escola" value="<?php echo $linha[0]; ?>">-->
                
                <select name="escola" class="comboPadrao" required>
                	<option value=""><< Selecione >></option>
			<?php
                while($linha = $resultEscola->fetch_row()){
            ?>
                	<option value="<?php echo $linha[0] ?>"><?php echo $linha[1] ?></option>
			<?php
                }
            ?>
                </select>
            </td>
        </tr>
        <tr>
        	<td>
            	Série:
            </td>
            <td>
            	<select name="serie" class="comboPadrao" required>
                	<option value=""><< Selecione >></option>
			<?php
                while($linha = $resultSerie->fetch_row()){
            ?>
                	<option value="<?php echo $linha[0] ?>"><?php echo $linha[1] ?></option>
			<?php
                }
            ?>
                </select>
            </td>
        </tr>
        <tr>
        	<td>
            	Código:
            </td>
            <td>
            	<input type="text" name="codigo" value="" required size="7" maxlength="50" class="textoPadraoUP">
            </td>
        </tr>
        <tr>
        	<td>
            	Vagas:
            </td>
            <td>
            	<input type="numeric" maxlength="3" name="vagas" value="" required style="width:40px;" class="textoPadrao" onchange="mascaraInteiro(this);" onkeypress="mascaraInteiro(this);">
            </td>
        </tr>
        <tr>
        	<td>
            	Data de Abertura:
            </td>
            <td>
            	<input type="date" name="data_abertura" value="" required class="textoPadrao">
            </td>
        </tr>
        <tr>
        	<td>
            	Data de Encerramento:
            </td>
            <td>
            	<input type="date" name="data_encerramento" value="" required class="textoPadrao" >
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