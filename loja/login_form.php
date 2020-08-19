<?php
#Pagina de login_from.php, Se o usuario ja estiver registado ele nao tera acesso a esta pagina ao executar isset($_SESSION["uid"])
#Se a declaração a baixo returnar true vai enviar o usuario para  perfil.php
if (isset($_SESSION["uid"])) {
	header("location:perfil.php");
}
//No carro.php se o usuario clicar "ready to checkout"  o usuario é enviado para a pagina de login_from.php para iniciar sessao
if (isset($_POST["login_user_with_product"])) {
	//Array da lista dos produtos
	$product_list = $_POST["produto_id"];
	//hQuando convertemos a Array para formato de json porque a array nao pode estar na armazenada na cookie
	$json_e = json_encode($product_list);
	//Aqui é onde criamos a cookie e o nome da cookie para product_list
	setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);

}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Inicio de Sessão para Clientes - MySuplementos</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand"><img src="Imagens/logo.png" height="55" width="200"></a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="http://localhost/Rock%20Tattoo/Index.html"><span class="glyphicon glyphicon-home"></span>Pagina Inicial</a></li>
			</ul>

		</div>
	</div>
</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alerta para se registar-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Iniciar Sessão Ou Criar Uma Conta</div>
					<div class="panel-body">
						<!--Iniciar Sessao-->
						<form onsubmit="return false" id="login">
							<label for="email">Email</label>
							<input type="email" class="form-control" name="email" id="email" required/>
							<label for="email">Palavra-Passe</label>
							<input type="password" class="form-control" name="password" id="password" required/>
							<p><br/></p>
							<input type="submit" class="btn btn-success" style="float:right;" Value="Iniciar Sessão">
							<!--Caso o usuario tenha colocado produtos no carrinho e nao se tenha registado ainda-->
							<div><a href="customer_registration.php?register=1">Criar uma conta nova</a></div>						
						</form>
				</div>
				<div class="panel-footer"><div id="e_msg"></div></div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
    </div>
</body>
</html>