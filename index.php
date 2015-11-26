<?php
	session_start();
	require("util.php");
	
	$con = conexao();
	
	//LOGIN
	if(isset($_POST["logon"]))
	{
		$usuario_email = strip_tags($_POST["usuario_email"]);
		$usuario_senha = strip_tags($_POST["usuario_senha"]);
		
		$consulta = mysqli_query($con,"SELECT id, nome FROM usuario WHERE email = '$usuario_email' and senha = sha1('$usuario_senha')"); //ADMIN
		
		$consulta2 = mysqli_query($con,"SELECT id, nome FROM responsavel WHERE email = '$usuario_email' and senha = sha1('$usuario_senha')"); //RESPONSÁVEL
		
		if(mysqli_num_rows($consulta) == 1 || mysqli_num_rows($consulta2) == 1){
			if(mysqli_num_rows($consulta) == 1){
				$linha = mysqli_fetch_array($consulta);
				$_SESSION["autenticado"] = true;
				$_SESSION["grupo"] = 0;
				$_SESSION["id_usuario"] = $linha["id"];
				$_SESSION["nome_usuairo"] = $linha["nome"];
				header("location:home.php?ida=ListarTurmas");
			}
			else if(mysqli_num_rows($consulta2) == 1){
				$linha = mysqli_fetch_array($consulta2);
				$_SESSION["autenticado"] = true;
				$_SESSION["grupo"] = 1;
				$_SESSION["id_usuario"] = $linha["id"];
				$_SESSION["nome_usuairo"] = $linha["nome"];
				header("location:home.php?ida=ListarAlunos");
			}
		}
		else
			header("location:index.php?erro_login_senha=1");
		
	}
	//CADASTRO
	if(isset($_POST["cadastro"]))
	{
		$nome = strip_tags($_POST["nome"]);
		$endereco = strip_tags($_POST["endereco"]);
		$telefone = $_POST["telefone"];
		$email = $_POST["email"];
		$senha = strip_tags($_POST["senha"]);
		
		$consulta = mysqli_query($con,"SELECT id, nome, email FROM responsavel WHERE email = '$email'");
		
		if(!mysqli_num_rows($consulta) == 1){
			if($con->query("insert into responsavel (nome, endereco, telefone, email, senha) values ('$nome','$endereco','$telefone','$email', sha1('$senha'))") == true)
				header("location:index.php?aviso=Cadastro realizado com sucesso! Acesse o sistema na opção ao lado");
			else
				header("location:index.php?ida=322a174b7913b&erro=Erro ao tentar cadastrar");
		}
		else
			header("location:index.php?ida=322a174b7913b&erro=Usuário <b>\"$email\"</b> já cadastrado no sistema.");
		
	}
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="estilo.css" />
<script language="javascript" src="script.js"></script>
<title>Escolas.net</title> 
</head>
<body topmargin="0" bottommargin="0">
	<div id="corpoPagina">
    	<div id="banner">
        	<!--<img id="imgBanner" src="media/logobanner.jpg">-->
        </div>
        <div id="conteudo">
        	<div id="divTextoIndex">
            	<h2>
                	Faça já sua reserva!!!
                </h2>
                <a href="?ida=322a174b7913b" class="BOTAO_AZUL">Quero me cadastrar</a><br><br>
                <a href="?ida=356a192b7913b" class="BOTAO_VERDE">Já sou cadastrado</a><br><br>
                <font color="#0066CC" size="2"><?php if(isset($_GET["aviso"])) echo $_GET["aviso"]; ?></font>
            </div>
            <div id="areaLogin">
            	<?php
					if(isset($_GET["ida"])){
						$pagina = $_GET["ida"];
						switch($pagina){
							case "322a174b7913b": include("view/login/formCadastro.php"); break;
							case "356a192b7913b": include("view/login/formLogin.php"); break;
						}
					}
					else
						include("view/login/formLogin.php");
				?>
            </div>
        </div>
        <div id="rodape">
        </div>
    </div>
</body>
</html>