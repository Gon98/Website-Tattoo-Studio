<?php
include ('db.php');


$produto_id=$_POST['id'];
$produto_cat=$_POST['produto_cat'];
$produto_marca=$_POST['produto_marca'];
$produto_titulo=$_POST['produto_titulo'];
$produto_preco=$_POST['produto_preco'];
$produto_stock=$_POST['produto_stock'];
$produto_img=$_POST['produto_img'];
$produto_keywords=$_POST['produto_keywords'];



$sql=mysqli_query($con,"UPDATE produtos SET produto_id = '$produto_id', produto_cat = '$produto_cat', produto_marca = '$produto_marca', produto_titulo = '$produto_titulo', produto_preco = '$produto_preco', produto_stock = '$produto_stock', produto_img = '$produto_img', produto_keywords = '$produto_keywords'  WHERE produto_id = $produto_id");
echo "<center><h1>Produto atualizado com sucesso</h1></center>";
echo "<center><h1>Aguarde enqunto redirecionamos para a lista dos produtos....</h1></center>";
mysqli_close($con)
?>
<script>
setTimeout(function() {
    window.location.href = "painel_admin.php";
}, 7000);
</script>