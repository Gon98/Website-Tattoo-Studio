<?php
include 'db.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_products = "SELECT * FROM produtos where produto_id = '$id'";
$resultado_products = mysqli_query($con, $result_products);  
?>
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml">
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
<title>Editar Produto</title>
<style>
<!--
.textBox { border:1px solid gray; width:200px;} 
-->
</style>
</head>

<body>
    <div class="container">
    <div class="span10 offset1">
    <div class="row">
    <h3>ADMIN Editar Produto</h3>
    </div>
<form  name="form1" method="post" action="editarprod.php">
 <table width="400" border="0" align="center">

                     
                        <label class="control-label">ID</label>
                        <div class="controls">
                            <input name="id" type="text"  placeholder="ID"  value="<?php $resultado_products = mysqli_query($con, $result_products); while($row_product = mysqli_fetch_assoc($resultado_products)) { echo ''. $row_product['produto_id'] . '';}?>" required>
                        </div>
                        <label class="control-label">Categoria</label>
                        <div class="controls">
                            <input name="produto_cat" type="text"  placeholder="Categoria" value="<?php $resultado_products = mysqli_query($con, $result_products); while($row_product = mysqli_fetch_assoc($resultado_products)) { echo ''. $row_product['produto_cat'] . '';}?>" required>
                        </div>
   
                        <label class="control-label">Marca</label>
                        <div class="controls">
                            <input name="produto_marca" type="text"  placeholder="Marca" value="<?php $resultado_products = mysqli_query($con, $result_products); while($row_product = mysqli_fetch_assoc($resultado_products)) { echo ''. $row_product['produto_marca'] . '';}?>" required>
                        </div>
     
                        <label class="control-label">Nome</label>
                        <div class="controls">
                            <input name="produto_titulo" type="text"  placeholder="Nome" value="<?php $resultado_products = mysqli_query($con, $result_products); while($row_product = mysqli_fetch_assoc($resultado_products)) { echo ''. $row_product['produto_titulo'] . '';}?>" required>
                        </div>
     
                        <label class="control-label">Preço</label>
                        <div class="controls">
                            <input name="produto_preco" type="text"  placeholder="Preço" value="<?php $resultado_products = mysqli_query($con, $result_products); while($row_product = mysqli_fetch_assoc($resultado_products)) { echo ''. $row_product['produto_preco'] . '';}?>" required>
                        </div>
     
                        <label class="control-label">Stock</label>
                        <div class="controls">
                            <input name="produto_stock" type="text"  placeholder="Stock" value="<?php $resultado_products = mysqli_query($con, $result_products); while($row_product = mysqli_fetch_assoc($resultado_products)) { echo ''. $row_product['produto_stock'] . '';}?>" required>
                        </div>
     
                        <label class="control-label">Imagem</label>
                        <div class="controls">
                            <input name="produto_img" type="file"  placeholder="Imagem" value="<?php $resultado_products = mysqli_query($con, $result_products); while($row_product = mysqli_fetch_assoc($resultado_products)) { echo ''. $row_product['produto_img'] . '';}?>" required>
                        </div>
     
                        <label class="control-label">Nome na Pesquisa</label>
                        <div class="controls">
                            <input name="produto_keywords" type="text"  placeholder="Nome na Pesquisa" value="<?php $resultado_products = mysqli_query($con, $result_products); while($row_product = mysqli_fetch_assoc($resultado_products)) { echo ''. $row_product['produto_keywords'] . '';}?>" required>
                        </div>
                              <div class="form-actions">
                          <button type="submit" class="btn btn-success" type="submit" name="Submit">Editar</button>
                          <a class="btn" href="painel_admin.php">Voltar</a>
                        </div>


 </table>
</form>
          </div>
    </div>          
</body>
</html>