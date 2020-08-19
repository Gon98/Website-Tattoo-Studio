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
    <title>ADMIN - Produtos</title>
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
					<a href="utilizador_admin.php" class="btn btn-primary">Clientes</a>
				  </p>
                </div>
                <h2>Produtos</h2>
                  <p>
					<a href="novoprod_admin.php" class="btn btn-success">Novo Produto</a>
				  </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Categoria</th>
                      <th>Marca</th>
                      <th>Nome1</th>
                      <th>Preço</th>
                      <th>Stock</th>
                      <th>Imagem</th>
                      <th>Nome Pesquisa</th>
                      <th>Editar/Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'db.php';
                 
                   $result_products = "SELECT * FROM produtos";
                    $resultado_products = mysqli_query($con, $result_products);  
                   while($row_product = mysqli_fetch_assoc($resultado_products)) {
                            echo '<tr>';
                            echo '<td>'. $row_product['produto_id'] . '</td>';
                            echo '<td>'. $row_product['produto_cat'] . '</td>';
                            echo '<td>'. $row_product['produto_marca'] . '</td>';
                            echo '<td>'. $row_product['produto_titulo'] . '</td>';
                            echo '<td>'. $row_product['produto_preco'] . '</td>';
                            echo '<td>'. $row_product['produto_stock'] . '</td>';
                            echo '<td>'. $row_product['produto_img'] . '</td>';
                            echo '<td>'. $row_product['produto_keywords'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn btn-success" href="update.php?id='.$row_product['produto_id'].'">Editar</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="apagarprod_admin.php?id='.$row_product['produto_id'].'">Eliminar</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
              
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>