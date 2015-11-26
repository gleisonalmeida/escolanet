<?php
	session_start(); //FUNÇÃO QUE INICIA UMA SESSÃO EM PHP
	require("util.php"); //CARREGA O CÓDIGO DA PÁGINA util.php PARA SER USADO NA PÁGINA HOME
	
	if(!isset($_SESSION["autenticado"])) //VERIFICA SE EXISTE A VARIÁVEL DE SESSÃO CHAMADA "$_SESSION["autenticado"]"
		header("location:index.php"); //REDICIONA PARA A PÁGINA index.php CASO NÃO FALSO
		
	if(isset($_GET["logoff"]) && $_GET["logoff"] == 1) //VERIFICA SE EXISTE A VARIÁVEL SOLICITANDO LOGOFF
	{
		unset($_SESSION["autenticado"]); //CASO EXISTA, MANTA AS VÁRIAVELIS E REDIRECIONA PARA A PÁGINA INDEX.PHP
		unset($_SESSION["grupo"]);
		unset($_SESSION["id_usuario"]);
		unset($_SESSION["nome_usuairo"]);
		header("location:index.php");
	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="estilo_home.css" />
<script language="javascript" src="script.js"></script>
<title>Escolas.net</title>
</head>
<body topmargin="0" bottommargin="0">
	<div id="corpoPagina">
    	<div id="banner">
        	<!--<img id="imgBanner" src="media/logobanner.jpg">-->
        </div>
<?php
	if($_SESSION["grupo"] == 0){
?>
        <div id="divmenu">
        	<div class="menu">
                <ul>
                    <li><a href="?ida=index">Escolas</a></li>
                    <li><a href="?ida=ListarTurmas">Turmas</a></li>
                    <li><a href="?ida=ListarSerie">Séries</a></li>
                    <li><a href="?ida=vaga">Consultar vagas</a></li>
                    <li><a href="?logoff=1">Sair</a></li>
                </ul>
            </div>
        </div>
        <div id="conteudo">
        	<?php
				if(isset($_GET["ida"])){
					$pagina = $_GET["ida"];
					switch($pagina){
						case "vaga": include("view/vaga/index.php"); break;
						
						case "index": include("view/escola/index.php"); break;
						case "inserir": include("view/escola/inserir.php"); break;
						case "alterar": include("view/escola/alterar.php"); break;
						case "excluir": include("view/escola/excluir.php"); break;
						
						case "ListarTurmas": include("view/turma/index.php"); break;
						case "InserirTurmas": include("view/turma/inserir.php"); break;
						case "AlterarTurmas": include("view/turma/alterar.php"); break;
						case "ExcluirTurmas": include("view/turma/excluir.php"); break;
						
						case "ListarSerie": include("view/serie/index.php"); break;
						case "InserirSerie": include("view/serie/inserir.php"); break;
						case "AlterarSerie": include("view/serie/alterar.php"); break;
						case "ExcluirSerie": include("view/serie/excluir.php"); break;

					}
				}
			?>
        </div>
<?php
	}  
	else if($_SESSION["grupo"] == 1){
?>
		<div id="divmenu">
        	<div class="menu">
                <ul>
                    <li><a href="?ida=ListarAlunos">Alunos</a></li>
                    <li><a href="?ida=">Reservas</a></li>
                    <li><a href="?ida=">x</a></li>
                    <li><a href="?ida=">x</a></li>
                    <li><a href="?logoff=1">Sair</a></li>
                </ul>
            </div>
        </div>
        <div id="conteudo">
        	<?php
				if(isset($_GET["ida"])){
					$pagina = $_GET["ida"];
					switch($pagina){
						case "ListarAlunos": include("view/aluno/index.php"); break;//b1d5781111d84f7b3fe45a0852e59758cd7a87e5
						case "InserirAlunos": include("view/aluno/inserir.php"); break;//17ba0791499db908433b80f37c5fbc89b870084b
						case "AlterarAlunos": include("view/aluno/alterar.php"); break;//7b52009b64fd0a2a49e6d8a939753077792b0554
						case "ExcluirAlunos": include("view/aluno/excluir.php"); break;//bd307a3ec329e10a2cff8fb87480823da114f8f4
					}
				}
			?>
        </div>
<?php
	}
?>
        <div id="rodape">
        	<?php
				echo "Usuário: ".$_SESSION["nome_usuairo"];
			?>
        </div>
    </div>
</body>
</html>