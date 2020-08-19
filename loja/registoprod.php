<?php
include('db.php');


$produto_id=$_POST['produto_id'];
$produto_cat=$_POST['produto_cat'];
$produto_marca=$_POST['produto_marca'];
$produto_titulo=$_POST['produto_titulo'];
$produto_preco=$_POST['produto_preco'];
$produto_stock=$_POST['produto_stock'];
$produto_img=$_POST['produto_img'];
$produto_keywords=$_POST['produto_keywords'];

$sql=mysqli_query($con,"INSERT INTO produtos(produto_id, produto_cat, produto_marca, produto_titulo, produto_preco, produto_stock, produto_img, produto_keywords)VALUES ('$produto_id', '$produto_cat', '$produto_marca', '$produto_titulo', '$produto_preco', '$produto_stock', '$produto_img', '$produto_keywords')");
echo "<center><h1>Produto adicionado com sucesso</h1></center>";
echo "<center><h1>Aguarde enqunto redirecionamos para a lista dos produtos....</h1></center>";
mysqli_close($con)
?>
<script>
setTimeout(function() {
    window.location.href = "painel_admin.php";
}, 7000);
</script>