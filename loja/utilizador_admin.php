<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
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
    <title>ADMIN - Clientes</title>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h4 class="glyphicon glyphicon-user">ADMIN</h4>
            </div>
            <div class="row">
            <div class="col-xs-12 col-sm-6">
                <p>
				  <a href="index_admin.php" class="btn btn-danger">Sair</a>
				</p>
            </div>
                <div class="col-xs-12 col-sm-6">
                  <p>
					<a href="painel_admin.php" class="btn btn-primary">Produtos</a>
				  </p>
                </div>

                <h2>Clientes</h2>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Email</th>
                      <th>Palavra-passe</th>
                      <th>Código Postal</th>
                      <th>Número</th>
                      <th>Data Nascimento</th>
            
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'db.php';
                 
                   $result_products = "SELECT * FROM utilizador";
                    $resultado_products = mysqli_query($con, $result_products);  
                   while($row_product = mysqli_fetch_assoc($resultado_products)) {
                            echo '<tr>';
                            echo '<td>'. $row_product['utilizador_id'] . '</td>';
                            echo '<td>'. $row_product['nome'] . '</td>';
                            echo '<td>'. $row_product['email'] . '</td>';
                            echo '<td>'. $row_product['password'] . '</td>';
                            echo '<td>'. $row_product['cep'] . '</td>';
                            echo '<td>'. $row_product['morada'] . '</td>';
                            echo '<td>'. $row_product['data_nasc'] . '</td>';
                   }
              
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>