<!doctype html>
<?php
if(isset($_POST['submit'])){
	$user = $_POST['username'];
	$pass = $_POST['password'];
	if($user=="admin@admin.com" && $pass=="admin"){
		header('Location: painel_admin.php');
	}else{
	error_reporting(0);
	}
}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ADMIN - Rock Tattoo Studio</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="apple-touch-icon" sizes="57x57" href="Imagens/admin.png">
<link rel="apple-touch-icon" sizes="60x60" href="Imagens/admin.png">
<link rel="apple-touch-icon" sizes="72x72" href="Imagens/admin.png">
<link rel="apple-touch-icon" sizes="76x76" href="Imagens/admin.png">
<link rel="apple-touch-icon" sizes="114x114" href="Imagens/admin.png">
<link rel="apple-touch-icon" sizes="120x120" href="Imagens/admin.png">
<link rel="apple-touch-icon" sizes="144x144" href="Imagens/admin.png">
<link rel="apple-touch-icon" sizes="152x152" href="Imagens/admin.png">
<link rel="apple-touch-icon" sizes="180x180" href="Imagens/admin.png">
<link rel="icon" type="image/png" sizes="192x192"  href="Imagens/admin.png">
<link rel="icon" type="image/png" sizes="32x32" href="Imagens/admin.png">
<link rel="icon" type="image/png" sizes="96x96" href="Imagens/admin.png">
<link rel="icon" type="image/png" sizes="16x16" href="Imagens/admin.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="Imagens/admin.png">
<meta name="theme-color" content="#ffffff">
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
			<a  class="navbar-brand"><img src="Imagens/logo.png" height="55" width="200"></a>
			</div>

		</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
		
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading glyphicon glyphicon-user">ADMIN</div>
					<div class="panel-body">
						<!--Iniciar Sessao-->
						<form action="" method="post">
							<label >Email(Admin)</label>
							<input class="form-control" type="text" name="username" placeholder="admin">
							<label>Palavra-Passe(Admin)</label>
							<input class="form-control" type="password" name ="password" placeholder="palavra-passe">
							<p><br/></p>
			               <input class="btn btn-success" type="submit" name="submit" value="Iniciar Sessão">						
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