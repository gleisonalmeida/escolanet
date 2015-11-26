<?php
	$con = conexao();
	$resultSerie = $con->query(" select id, descricao from serie order by descricao");
?>
	<table class="tabelaRegistros" frame="box" rules="all" width="100%">
    	<tr class="tabelaLinhaTitulo">
        	<td colspan="3" align="center">
            	<b>Séries</b>
            </td>
        </tr>
        <tr>
        	<td colspan="3">
            	<a href="?ida=InserirSerie" class="Registro">Inserir</a>
            </td>
        </tr>
<?php
	if($resultSerie->num_rows > 0){
?>
		<tr class="tabelaLinhaTitulo">
        	<td align="center" width="50">
            	ID
            </td>
            <td align="center" width="250">
            	Descrição
            </td>
            <td>
            </td>
        </tr>
<?php
		$contador = 0;
		
		while($linha = $resultSerie->fetch_row()){
			
			$contador += 1;
?>
		<tr <?php if($contador % 2 == 1) echo "id='linhaRegistro'"; else echo "id='linhaRegistro2'"; ?>>
        	<td align="center">
            	<?php echo $linha[0]; ?>
            </td>
            <td align="center">
            	<?php echo $linha[1]; ?>
            </td>
            <td>
            	<a href="?ida=AlterarSerie&id=<?php echo $linha[0]; ?>" class="Registro">Alterar</a>
                <a href="?ida=ExcluirSerie&id=<?php echo $linha[0]; ?>" onclick="return confirmarExclusao();" class="Registro">Excluir</a>
            </td>
        </tr>
<?php
		}
	}
	else{
?>
		<tr>
        	<td colspan="3">
            	Sem resultados.
            </td>
        </tr>
<?php
	}
?>
    </table>