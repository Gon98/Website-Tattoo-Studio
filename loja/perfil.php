<?php

session_start();
echo $_SESSION["uid"];
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>MySuplementos Online - A Loja de Suplementos Nº1</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
		<style>
			@media screen and (max-width:480px){
				#search{width:80%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
			}
		</style>
	</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="navbar-brand"><img src="Imagens/logo.png" height="55" width="200"></a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="http://localhost/Rock%20Tattoo/InicioLogin2.php"><span class="glyphicon glyphicon-home"></span>Pagina Inicial</a></li>
				<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"></li>
				<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Pesquisar</button></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Carrinho<span class="badge">0</span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3">Nº</div>
									<div class="col-md-3">Imagem</div>
									<div class="col-md-3">Produto</div>
									<div class="col-md-3">€.</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $.</div>
								</div>-->
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Ola,".$_SESSION["name"]; ?></a>
					<ul class="dropdown-menu">
                        <li><a href="carro.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-shopping-cart">Carrinho</span></a></li>
			
				
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;">Sair</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_category">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<div id="get_brand">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brand</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
			</div>
			<div class="col-md-8">	
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-info" id="scroll">
					<div class="panel-heading">Produtos</div>
					<div class="panel-body">
						<div id="get_product">
							<!--Aqui temos o pedido do produto-->
						</div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body">
									<img src="product_images/images.JPG"/>
								</div>
								<div class="panel-heading">$.500.00
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div> -->
                        <h4>Patrocinios</h4>
						<div class="row">					
					<div class="col-xs-12 col-sm-2">
						<a href="https://thesolidink.com/"><img alt="" src="imagens/solid.jpg"></a>
					</div>
					<div class="col-xs-12 col-sm-2">
						<a href="https://eternaltattooink.com/"><img alt="" src="imagens/eternal.png"></a>
					</div>
					<div class="col-xs-12 col-sm-2">
						<a href="https://www.electricink.com.br/"><img alt="" src="imagens/eletric.png"></a>
					</div>
					<div class="col-xs-12 col-sm-2">
						<a href="https://www.wildcat.eu/product/professional/tattoo-supply/power-supplies/cat-power-01-power-supply/"><img alt="" src="imagens/cat.png"></a>
					</div>
					<div class="col-xs-12 col-sm-2">
						<a href="https://www.kwadron.pl/pl/"><img alt="" src="imagens/kwadron.png"></a>
					</div>
				</div>
					</div>
					<div class="panel-footer">COPYRIGHT © 2018 A TUA LOJA | MYSUPLEMENTOS</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>
				</center>
			</div>
		</div>
	</div>
</body>
</html>