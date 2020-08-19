<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
/*Vai a BD buscar o nome da tabela Categoria e as categorias nela inseridas para o index.php/perfil.php*/
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categorias";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categorias</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_titulo"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
/*Vai a BD buscar o nome da tabela Marcas e as maras nela inseridas para o index.php/prfile.php*/
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM marcas";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Marcas</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["marca_id"];
			$brand_name = $row["marca_titulo"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}

if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM produtos LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['produto_id'];
			$pro_cat   = $row['produto_cat'];
			$pro_brand = $row['produto_marca'];
			$pro_title = $row['produto_titulo'];
			$pro_price = $row['produto_preco'];
            $pro_desc = $row['produto_stock'];
			$pro_image = $row['produto_img'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='imagens/$pro_image' class='img-responsive'/>
								</div>
								<div class='panel-heading'>$pro_price € <br> Stock:($pro_desc)   
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Comprar</button>
								</div>
							</div>
						</div>	
			";
		}
	}
}
/*Pesquisa*/
if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM produtos WHERE produto_cat = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["marca_id"];
		$sql = "SELECT * FROM produtos WHERE produto_marca = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM produtos WHERE produto_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['produto_id'];
			$pro_cat   = $row['produto_cat'];
			$pro_brand = $row['produto_marca'];
			$pro_title = $row['produto_titulo'];
			$pro_price = $row['produto_preco'];
            $pro_desc = $row['produto_stock'];
			$pro_image = $row['produto_img'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='imagens/$pro_image' class='img-responsive'/>
								</div>
								<div class='panel-heading'>$pro_price € <br> Stock:($pro_desc)
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Comprar</button>
								</div>
							</div>
						</div>	
			";
		}
	}
	

/*Vai adicionar os produtos ao carro e verificar se um produto ja existe no carro */
	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION["uid"])){

		$utilizador_id = $_SESSION["uid"];

		$sql = "SELECT * FROM carro WHERE p_id = '$p_id' AND utilizador_id = '$utilizador_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Este produto já esta adicionado..!</b>
				</div>
			";
		} else {
			$sql = "INSERT INTO `carro`
			(`p_id`, `ip_add`, `utilizador_id`, `quantidade`) 
			VALUES ('$p_id','$ip_add','$utilizador_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Produto adicionado com sucesso..!</b>
					</div>
				";
			}
		}
		}else{
			$sql = "SELECT id FROM carro WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND utilizador_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Este produto já esta adicionado..!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `carro`
			(`p_id`, `ip_add`, `utilizador_id`, `quantidade`) 
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Produto adicionado com sucesso..!</b>
					</div>
				";
				exit();
			}
			
		}
		
		
		
		
	}

//carrinho do usuario na conta
if (isset($_POST["count_item"])) {
	//Quando o usuario iniciar sessao vai contar o numero de produtos que tem no carrinho 
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM carro WHERE utilizador_id = $_SESSION[uid]";
	}else{
		//Quando o usuario não tiver iniciado sessao vai contar os produtos que tem no carrinho
		$sql = "SELECT COUNT(*) AS count_item FROM carro WHERE ip_add = '$ip_add' AND utilizador_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}


//Vai busca os produtos na BD
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//Quando o usuario tiver iniciado sessao vai buscar a BD o id, nome, img, preço do produto selecionado
		$sql = "SELECT a.produto_id,a.produto_titulo,a.produto_preco,a.produto_img,b.id,b.quantidade FROM produtos a,carro b WHERE a.produto_id=b.p_id AND b.utilizador_id='$_SESSION[uid]'";
	}else{
		//Quando o usuario nao tiver iniciado sessao vai buscar a BD o id, nome, img, preço do produto selecionado
		$sql = "SELECT a.produto_id,a.produto_titulo,a.produto_preco,a.produto_img,b.id,b.quantidade FROM produtos a,carro b WHERE a.produto_id=b.p_id AND b.ip_add='$ip_add' AND b.utilizador_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//Mostra o id, img, nome, preço  
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$produto_id = $row["produto_id"];
				$produto_titulo = $row["produto_titulo"];
				$produto_preco = $row["produto_preco"];
				$produto_img = $row["produto_img"];
				$cart_item_id = $row["id"];
				$quantidade = $row["quantidade"];
				echo '
					<div class="row">
						<div class="col-md-3">'.$n.'</div>
						<div class="col-md-3"><img class="img-responsive" src="imagens/'.$produto_img.'" /></div>
						<div class="col-md-3">'.$produto_titulo.'</div>
						<div class="col-md-3">'.$produto_preco.'€</div>
					</div>';
				
			}
			?>
				<a style="float:right;" href="carro.php" class="btn btn-warning">Editar&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
			<?php
			exit();
		}
	}
	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//O mesmo mas so que o usuario nao esta com a sessao iniciada
			echo "<form method='post' action='login_form.php'>";
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$produto_id = $row["produto_id"];
					$produto_titulo = $row["produto_titulo"];
					$produto_preco = $row["produto_preco"];
					$produto_img = $row["produto_img"];
					$cart_item_id = $row["id"];
					$quantidade = $row["quantidade"];
//ADD o botao para eliminar ou atualizar o produto e mostra a img, nome , quantidade , preço  
					echo 
						'<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href="#" remove_id="'.$produto_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$produto_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<input type="hidden" name="produto_id[]" value="'.$produto_id.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<div class="col-md-2"><img class="img-responsive" src="imagens/'.$produto_img.'"></div>
								<div class="col-md-2">'.$produto_titulo.'</div>
								<div class="col-md-2"><input type="text" class="form-control quantidade" value="'.$quantidade.'" ></div>
								<div class="col-md-2"><input type="text" class="form-control price" value="'.$produto_preco.'" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" value="'.$produto_preco.'" readonly="readonly"></div>
							</div>';
				}
				
				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;"> </b>
					</div>';
            //Botao para finalizar compras
				if (!isset($_SESSION["uid"])) {
					echo '<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="Finalizar Compra" >
							</form>';
					
				}else if(isset($_SESSION["uid"])){
					//Paypal 
					echo '
						</form>
						<form action="http://localhost/Rock%20Tattoo/loja/finalizar_compra.php" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="shoppingcart@khanstore.com">
							<input type="hidden" name="upload" value="1">';
							  
							$x=0;
							$sql = "SELECT a.produto_id,a.produto_titulo,a.produto_preco,a.produto_img,b.id,b.quantidade FROM produtos a,carro b WHERE a.produto_id=b.p_id AND b.utilizador_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo  	
									'<input type="hidden" name="item_name_'.$x.'" value="'.$row["produto_titulo"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["produto_preco"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["quantidade"].'">';
								}
							  
							echo   
								'<input type="hidden" name="return" value="http://localhost/Programacao/loja/finalizar_compra.php.php"/>
					                <input type="hidden" name="notify_url" value="http://localhost/Programacao/loja/finalizar_compra.php.php">
									<input type="hidden" name="cancel_return" value="http://localhost/Programacao/loja/cancel.php"/>
									<input type="hidden" name="currency_code" value="USD"/>
									<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
									<input style="float:right;margin-right:80px;" type="image" name="submit"
										src="imagens/btn_comprar.png" alt=""
										alt="">
								</form>';
				}
			}
	}
	
	
}

//Remover produtos do carro
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM carro WHERE p_id = '$remove_id' AND utilizador_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM carro WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Produto removido do carrinho</b>
				</div>";
		exit();
	}
}


//Atualizar produtos do carro
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$quantidade = $_POST["quantidade"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE carro SET quantidade='$quantidade' WHERE p_id = '$update_id' AND utilizador_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE carro SET quantidade='$quantidade' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Produto atualizado</b>
				</div>";
		exit();
	}
}
?>