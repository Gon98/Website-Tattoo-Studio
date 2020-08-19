$(document).ready(function(){
	cat();
	brand();
	product();
	//cat() e a funçao que vai buscar a categoria registada da bd sempre que a pagina fizer load
	function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);
				
			}
		})
	}
	//brand() e a funçao que vai buscar a marca registada da bd sempre que a pagina fizer load
	function brand(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{brand:1},
			success	:	function(data){
				$("#get_brand").html(data);
			}
		})
	}
	//product() e a funçao que vai buscar o produto registada da bd sempre que a pagina fizer load
		function product(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	}
	/*	Quando a pagina fizer load com sucesso entao a lista de categorias quando o usuario clicar na catgoria ele vai buscar o id da categoria e de acordo com o id ele vai mostrar os produtos
	*/
	$("body").delegate(".category","click",function(event){
		$("#get_product").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})

	/*	Quando a pagina fizer load com sucesso entao a lista de marcas quando o usuario clicar na marca ele vai buscar o id da marca e de acordo com o id ele vai mostrar os produtos
	*/
	$("body").delegate(".selectBrand","click",function(event){
		event.preventDefault();
		$("#get_product").html("<h3>Loading...</h3>");
		var bid = $(this).attr('bid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{selectBrand:1,marca_id:bid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})
	/*
		Atravez do botao de pesquisa ele mostra ao usuario o produto que quer pesquisando pelo seu nome
	*/
	$("#search_btn").click(function(){
		$("#get_product").html("<h3>Loading...</h3>");
		var keyword = $("#search").val();
		if(keyword != ""){
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{search:1,keyword:keyword},
			success	:	function(data){ 
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
		}
	})
	//fim


	/*
		Quando o  #login e login form id forem available em index.php 
		 dados de entrada sao enviados para login.php
		se o usuario fizer login_success string from login.php quer dizer que o usuario iiniciou sessao e window.location e 
		usada para enviar o usuario para pagina inicial do  perfil.php 
	*/
	$("#login").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url	:	"login.php",
			method:	"POST",
			data	:$("#login").serialize(),
			success	:function(data){
				if(data == "login_success"){
					window.location.href = "perfil.php";
				}else if(data == "cart_login"){
					window.location.href = "carro.php";
				}else{
					$("#e_msg").html(data);
					$(".overlay").hide();
				}
			}
		})
	})
	//fim
    
    

	//Pega nas informaçoes do usuario antes do checkout
	$("#signup_form").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "registar.php",
			method : "POST",
			data : $("#signup_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "register_success") {
					window.location.href = "carro.php";
				}else{
					$("#signup_msg").html(data);
				}
				
			}
		})
	})
	//fim

	//Add produtos ao carrinho
	$("body").delegate("#product","click",function(event){
		var pid = $(this).attr("pid");
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addToCart:1,proId:pid},
			success : function(data){
				count_item();
				getCartItem();
				$('#product_msg').html(data);
				$('.overlay').hide();
			}
		})
	})
	//Fim
	//Funçao de contagem de produtos do carrinho do usuario
	count_item();
	function count_item(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {count_item:1},
			success : function(data){
				$(".badge").html(data);
			}
		})
	}
	//fim

	//Busca os itens do carrinho na BD para o menu
	getCartItem();
	function getCartItem(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,getCartItem:1},
			success : function(data){
				$("#cart_product").html(data);
			}
		})
	}

	//fim

	/*
		Quando o usuario mudar quantidade e feito de imediato update ao total usando a funçao keyup 
		mas se o usuario meter alguma coisa como( ?''"",.()''etc) a quantidade fica  quantidade=1
		Se o usuario meter quantidade 0 ou menos que 0 a quantidade vai ficar na mesma 1 quantidade=1
		('.total').each() este é a funçao loop que repete para a classe .total e em todas as repetiçoes vai executar uma soma na class .total 
		e o resultado é mostrado na classe .net_total
	*/
	$("body").delegate(".quantidade","keyup",function(event){
		event.preventDefault();
		var row = $(this).parent().parent();
		var price = row.find('.price').val();
		var quantidade = row.find('.quantidade').val();
		if (isNaN(quantidade)) {
			quantidade = 1;
		};
		if (quantidade < 1) {
			quantidade = 1;
		};
		var total = price * quantidade;
		row.find('.total').val(total);
		var net_total=0;
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : " +net_total+ "€");

	})
	//fim 

	/*
		Sempre que o usuario clicar na classe .remove vai ser retirado o id do produto da row 
		e vai mandar para action.php para realizar a operação de remover
	*/
	$("body").delegate(".remove","click",function(event){
		var remove = $(this).parent().parent().parent();
		var remove_id = remove.find(".remove").attr("remove_id");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{removeItemFromCart:1,rid:remove_id},
			success	:	function(data){
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})
	})
	/*
		Sempre que o usuario clicar na classe .update vai ser retirado o id do produto da row 
		e vai ser enviado para action.php para executar a operação de atualizar a quantidade do produto
	*/
	$("body").delegate(".update","click",function(event){
		var update = $(this).parent().parent().parent();
		var update_id = update.find(".update").attr("update_id");
		var quantidade = update.find(".quantidade").val();
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{updateCartItem:1,update_id:update_id,quantidade:quantidade},
			success	:	function(data){
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})


	})
	checkOutDetails();
	net_total();
	/*
		checkOutDetails() funçao que serve para 2 coisas
		Primeira vai habilitar o php isset($_POST["Common"]) na pagina action.php e no interior ha 2 funçoes isset que sao isset($_POST["getCartItem"]) e a outra é isset($_POST["checkOutDetials"])
		getCartItem é usada para mostrar os itens no carrinho dentro do menu dropdown
		checkOutDetails é usada para mostrar os itens no carrinho  na pagina Carro.php 
	*/
	function checkOutDetails(){
	 $('.overlay').show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,checkOutDetails:1},
			success : function(data){
				$('.overlay').hide();
				$("#cart_checkout").html(data);
					net_total();
			}
		})
	}
	/*
		net_total serve para calcular o total do carrinho
	*/
	function net_total(){
		var net_total = 0;
		$('.quantidade').each(function(){
			var row = $(this).parent().parent();
			var price  = row.find('.price').val();
			var total = price * $(this).val()-0;
			row.find('.total').val(total);
		})
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : " +net_total+ "€");
	}

	//remove os produtos do carrinho

	page();
	function page(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{page:1},
			success	:	function(data){
				$("#pageno").html(data);
			}
		})
	}
	$("body").delegate("#page","click",function(){
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{getProduct:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	})
})