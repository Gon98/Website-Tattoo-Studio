<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <title>ADMIN - Pedidos de Compras</title>
</head>
 
<body>
    <div class="container">
            <div class="row">
                
                <h4 class="glyphicon glyphicon-user">ADMIN</h4>
            </div>
            <div class="row">        
                <div class="col-xs-12 col-sm-4">
                 <p>
				  <a href="loginadmin.php" class="btn btn-danger">Sair</a>
				 </p>
                </div>
                <div class="col-xs-12 col-sm-4">
                                  <p>
					<a href="painelusuario.php" class="btn btn-primary">Clientes</a>
				  </p>
                </div>
                 <div class="col-xs-12 col-sm-4" style="margin-bottom:2%;">
                                  <p>
					<a href="painel.php" class="btn btn-primary">Produtos</a>
				  </p>
                </div>
                <h2>Pedidos de Compras</h2>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>ID Cliente</th>
                      <th>ID Produto</th>
                      <th>Quantidade</th>
                      <th>ID Transação</th>
                      <th>Estado do Pagamento</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'db.php';
                 
                   $result_products = "SELECT * FROM orders";
                    $resultado_products = mysqli_query($con, $result_products);  
                   while($row_product = mysqli_fetch_assoc($resultado_products)) {
                            echo '<tr>';
                            echo '<td>'. $row_product['order_id'] . '</td>';
                            echo '<td>'. $row_product['utilizador_id'] . '</td>';
                            echo '<td>'. $row_product['produto_id'] . '</td>';
                            echo '<td>'. $row_product['quantidade'] . '</td>';
                            echo '<td>'. $row_product['trx_id'] . '</td>';
                            echo '<td>'. $row_product['p_status'] . '</td>';
                            echo '</tr>';
                   }
              
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>