<?php
include "db.php";

session_start();

#Script de Iniciar Sessao 
if(isset($_POST["email"]) && isset($_POST["password"])){
	$email = mysqli_real_escape_string($con,$_POST["email"]);
	$password = md5($_POST["password"]);
	$sql = "SELECT * FROM utilizador WHERE email = '$email' AND password = '$password'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	//Se estiver certo o usuario  $count vai ser igual a 1
	if($count == 1){
		$row = mysqli_fetch_array($run_query);
		$_SESSION["uid"] = $row["utilizador_id"];
		$_SESSION["name"] = $row["nome"];
		$ip_add = getenv("REMOTE_ADDR");
		//Foi criada uma cookie em  login_form.php se a cookie for available os usuarios nao vai iniciar sessao
			if (isset($_COOKIE["product_list"])) {
				$p_list = stripcslashes($_COOKIE["product_list"]);
				//Ira passar stored json product list cookie para uma array normal
				$product_list = json_decode($p_list,true);
				for ($i=0; $i < count($product_list); $i++) { 
					//Antes do usuario pegar o id da bd onde vamos verificar o check in  se estiver pronto vao ser listados os produtos ou nao
					$verify_cart = "SELECT id FROM carro WHERE utilizador_id = $_SESSION[uid] AND p_id = ".$product_list[$i];
					$result  = mysqli_query($con,$verify_cart);
					if(mysqli_num_rows($result) < 1){
						//Se o usuario add pela primeira vez produtos ira dar update ao utilizador_id dentro da tabela na bd com um id valido
						$update_cart = "UPDATE carro SET utilizador_id = '$_SESSION[uid]' WHERE ip_add = '$ip_add' AND utilizador_id = -1";
						mysqli_query($con,$update_cart);
					}else{
						//Se o produto comprado ja existir na BD ele apaga o anterior
						$delete_existing_product = "DELETE FROM carro WHERE utilizador_id = -1 AND ip_add = '$ip_add' AND p_id = ".$product_list[$i];
						mysqli_query($con,$delete_existing_product);
					}
				}
                
				setcookie("product_list","",strtotime("-1 day"),"/");
				//Se o usuario iniciar sessao depois da pagina do carrinho vai enviar-lhe para o check out
				echo "cart_login";
				exit();
				
			}
			//Se o usuario iniciar sessao ou falhar envia as mensagens em baixo
			echo "login_success";
			exit();
		}else{
			echo "<span style='color:red;'>Registe-se antes de iniciar sessão</span>";
			exit();
		}
	
}

?>