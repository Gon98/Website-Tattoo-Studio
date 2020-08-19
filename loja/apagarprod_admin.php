<?php
    require 'db2.php';
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM produtos  WHERE produto_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: painel_admin.php");
         
    }
?>
 
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
    <title>Eliminar Produto</title>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>ADMIN Eliminar Produto</h3>
                    </div>
                     
                    <form class="form-horizontal" action="apagar.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Tens a certeza que queres apagar este produto ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Sim</button>
                          <a class="btn" href="painel_admin.php">Não</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>