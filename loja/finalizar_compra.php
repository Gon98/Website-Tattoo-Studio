<?php
session_start();
?>
<!-------------Vai buscar os dados---------->
					<!DOCTYPE html>
					<html>
						<head>
							<meta charset="UTF-8">
							<title>Pagamento feito com Sucesso</title>
							<link rel="stylesheet" href="css/bootstrap.min.css"/>
							<script src="js/jquery2.js"></script>
							<script src="js/bootstrap.min.js"></script>
							<script src="main.js"></script>
							<link rel="stylesheet" type="text/css" href="style.css"/>
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
					<body>
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
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Obrigado</h1>
											<hr/>
											<p>Ola <?php echo "<b>".$_SESSION["name"]."</b>"; ?>, O seu pagamento foi efetuado com Sucesso e o id da sua Transação é: (1AGF453DHN##G)</b><br/>
											Podes continuar para a Loja<br/></p>
											<a href="index.php" class="btn btn-success btn-lg">Continuar para a Loja</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>