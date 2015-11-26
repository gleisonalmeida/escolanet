<?php
	function conexao(){
		$conexao = new  mysqli("localhost","root","","escola");
		$conexao->set_charset('utf8');
		return $conexao;
	}
?>