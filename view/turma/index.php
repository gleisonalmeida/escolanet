<?php
	$con = conexao();
	$resultTurmas = $con->query(	" select t.id, s.descricao serie, t.codigo, t.vagas, t.data_abertura, t.data_encerramento".
									" from turma t, serie s".
									" where t.id_serie = s.id");
?>
	<table class="tabelaRegistros" frame="box" rules="all" width="100%">
    	<tr class="tabelaLinhaTitulo">
        	<td colspan="7" align="center">
            	<b>Turmas</b>
            </td>
        </tr>
        <tr>
        	<td colspan="7">
            	<a href="?ida=InserirTurmas" class="Registro">Inserir</a>
            </td>
        </tr>
<?php
	if($resultTurmas->num_rows > 0){
?>
		<tr class="tabelaLinhaTitulo">
        	<td align="center" width="50">
            	ID
            </td>
            <td align="center" width="150">
            	Série
            </td>
            <td align="center" width="150">
            	Código
            </td>
            <td align="center">
            	Vagas
            </td>
            <td align="center" width="170">
            	Data de Abertura
            </td>
            <td align="center" width="170">
            	Data de Encerramento
            </td>
            <td width="170">
            </td>
        </tr>
<?php
		$contador = 0;
		
		while($linha = $resultTurmas->fetch_row()){
			
			$contador += 1;
?>
		<tr <?php if($contador % 2 == 1) echo "id='linhaRegistro'"; else echo "id='linhaRegistro2'"; ?>>
        	<td align="center">
            	<?php echo $linha[0]; ?>
            </td>
            <td align="center">
            	<?php echo $linha[1]; ?>
            </td>
            <td align="center">
            	<?php echo $linha[2]; ?>
            </td>
            <td align="center">
            	<?php echo $linha[3]; ?>
            </td>
            <td align="center">
            	<?php echo date_format(date_create($linha[4]), 'd/m/y'); ?>
            </td>
            <td align="center">
            	<?php echo date_format(date_create($linha[5]), 'd/m/y'); ?>
            </td>
            <td align="center">
            	<a href="?ida=AlterarTurmas&id=<?php echo $linha[0]; ?>" class="Registro">Alterar</a>
                <a href="?ida=ExcluirTurmas&id=<?php echo $linha[0]; ?>" onclick="return confirmarExclusao();" class="Registro">Excluir</a>
            </td>
        </tr>
<?php
		}
	}
	else{
?>
		<tr>
        	<td colspan="7">
            	Sem Resultados.
            </td>
        </tr>
<?php
	}
?>
    </table>