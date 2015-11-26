<?php
	$con = conexao();
	
	$idUsuario = $_SESSION["id_usuario"];
	
	$idTurma = $_GET["id"];
	
	$resultTurma = $con->query(	" select t.id, t.id_escola, s.id, s.descricao serie, t.codigo, t.vagas, t.data_abertura, t.data_encerramento".
								" from turma t, serie s".
								" where t.id_serie = s.id".
								" and t.id = $idTurma");
	
	$resultEscola = $con->query("select id,nome from escola order by nome");
	
	$resultSerie = $con->query("select id, descricao from serie order by descricao");
	
	if(isset($_POST["postback"])){
		$escola = $_POST["escola"];
		$serie = $_POST["serie"];
		$codigo = strtoupper(strip_tags($_POST["codigo"]));
		$vagas = strip_tags($_POST["vagas"]);
		$data_abertura = strip_tags($_POST["data_abertura"]);
		$data_encerramento = strip_tags($_POST["data_encerramento"]);
		
		if($con->query("update turma set id_escola=$escola, id_serie=$serie, codigo='$codigo', vagas=$vagas, data_abertura='$data_abertura', data_encerramento='$data_encerramento' where id = $idTurma") == true)
			header("location:home.php?ida=ListarTurmas");
		else
			header("location:home.php?ida=AlterarTurmas&erro=".$con->error);
	}
	
	$linhaTurma = $resultTurma->fetch_row();
	// onSubmit="return validaFormTurma(this);"
?>
<form action="" method="post" name="turma"  onsubmit="return checarDatas()">
	<input type="hidden" name="postback" value="1">
    
	<table class="tabelaForm" frame="box" rules="all" width="100%">
    	<tr class="tabelaLinhaTitulo">
        	<td colspan="7" align="center">
            	<b>Alterar Turma</b>
            </td>
        </tr>
		<tr>
        	<td width="170">
            	Escola:
            </td>
            <td>
                <select name="escola" class="comboPadrao" required>
                	<option value=""><< Selecione >></option>
			<?php
                while($linha = $resultEscola->fetch_row()){
            ?>
                	<option value="<?php echo $linha[0] ?>" <?php if($linhaTurma[1] == $linha[0]) echo "selected='selected'"; ?>><?php echo $linha[1] ?></option>
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
            	<select name="serie" class="comboPadrao">
                	<option value="0"><< Selecione >></option>
			<?php
                while($linha = $resultSerie->fetch_row()){
            ?>
                	<option value="<?php echo $linha[0] ?>" <?php if($linhaTurma[2] == $linha[0]) echo "selected='selected'"; ?>><?php echo $linha[1] ?></option>
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
            	<input type="text" name="codigo" value="<?php echo $linhaTurma[4]; ?>" size="7" maxlength="50" class="textoPadraoUP">
            </td>
        </tr>
        <tr>
        	<td>
            	Vagas:
            </td>
            <td>
            	<input type="numeric" name="vagas" value="<?php echo $linhaTurma[5]; ?>" style="width:40px;" class="textoPadrao" onchange="mascaraInteiro(this);" onkeypress="mascaraInteiro(this);">
            </td>
        </tr>
        <tr>
        	<td>
            	Data de Abertura:
            </td>
            <td>
            	<input type="date" name="data_abertura" value="<?php echo date('Y-m-d', strtotime($linhaTurma[6])); ?>" required class="textoPadrao">
            </td>
        </tr>
        <tr>
        	<td>
            	Data de Encerramento:
            </td>
            <td>
            	<input type="date" name="data_encerramento" value="<?php echo date('Y-m-d', strtotime($linhaTurma[7])); ?>" required class="textoPadrao">
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