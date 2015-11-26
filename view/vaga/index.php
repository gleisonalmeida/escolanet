<?php
	$con = conexao();
	$resultSerie = $con->query(" select id, descricao from serie order by descricao");
	$resultEscola = $con->query("select id, nome from escola order by nome");
	
	$idEscola = ($_POST)?$_POST["escola"]:'';
	$idSerie = ($_POST)?$_POST["serie"]:''	;
	
	$resultVagas = $con->query(	" select t.id, t.id_escola, s.id, s.descricao serie, t.codigo, t.vagas, t.data_abertura, t.data_encerramento".
								" from turma t, serie s".
								" where t.id_serie = s.id".
								" and t.id_escola = $idEscola and s.id = $idSerie");
								
?>


	<table class="tabelaRegistros" frame="box" rules="all" width="100%">
    	<tr class="tabelaLinhaTitulo">
        	<td colspan="3" align="center">
            	<b>Filtros</b>
            </td>
        </tr>
        <tr>
        	<td colspan="3">
            
            <form action="" method="post"> 
            
            <tr>
        	<td width="170">
            	Escola:
            </td>
            <td>
                <select name="escola" class="comboPadrao" required>
                	<option value=""><< Selecione >></option>
					<?php while($linha = $resultEscola->fetch_row()){ ?>
                	<option value="<?php echo $linha[0] ?>" <?php if($idEscola == $linha[0]) echo "selected='selected'"; ?> ><?php echo $linha[1] ?></option>
					<?php } ?>
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
                	<option value="<?php echo $linha[0] ?>" <?php if($idSerie == $linha[0]) echo "selected='selected'"; ?> ><?php echo $linha[1] ?></option>
			<?php
                }
            ?>
                </select>
            </td>
        </tr>
        
            <tr>
                <td>
                    <input type="submit" value="Consultar" class="botoes">
                </td>
            </tr>
            
            </form>
                        	
            </td>
        </tr>
<?php
	if($_POST && $resultVagas->num_rows > 0){
?>
		<tr class="tabelaLinhaTitulo">
        	<td align="center" width="50">
            	Codigo da Turma
            </td>
            <td align="center" width="250">
            	Numero de Vagas
            </td>
            <td>
            </td>
        </tr>
<?php
		$contador = 0;
		$totalvagas = 0;
		
		while($linha = $resultVagas->fetch_row()){
			
			$contador += 1;
			$totalvagas += $linha[5];
?>
		<tr <?php if($contador % 2 == 1) echo "id='linhaRegistro'"; else echo "id='linhaRegistro2'"; ?>>
        	<td align="center">
            	<?php echo $linha[4]; ?>
            </td>
            <td align="center">
            	<?php echo $linha[5]; ?>
            </td>
            
        </tr>
        
<?php
		} 
		?> <tr>        	           
            <td align="center" >
            	TOTAL
            </td>
            <td align="center" >
            	<?php echo $totalvagas; ?>
            </td>
            
        </tr>
<?php		
	} else{
?>
<tr class="tabelaLinhaTitulo">
        	<td align="center" width="50">
            	Codigo da Turma
            </td>
            <td align="center" width="250">
            	Numero de Vagas
            </td>
            <td>
            </td>
        </tr>
		<tr>
        	<td colspan="3" align="center">
            	<br> SEM RESULTADO. <br> 
            </td>
        </tr>
<?php
	}
?>
    </table>