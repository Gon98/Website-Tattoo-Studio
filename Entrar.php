<!-------------Registar---------->
<?php
#Codigo para tirar os erros
error_reporting(0);
ini_set("display_errors", 0 );

 include_once("conexao.php");

 $nome = $_POST['nome'];
 $data_nasc = $_POST['data_nasc'];
 $email = $_POST['email'];
 $cep = $_POST['cep'];
 $morada = $_POST['morada'];
 $password = $_POST['password'];



#Verifica se tem um email para pesquisa
if(isset($_POST['email'])){ 

  #Recebe o Email Postado
  $emailPostado = $_POST['email'];

  #Conecta banco de dados 
  include_once("conexao.php");
  $password = md5($_POST["password"]);
  $sql = mysqli_query($conexao, "SELECT * FROM utilizador WHERE email = '{$email}'") ;

  #Se o retorno for maior do que zero, diz que já existe um.
  if(mysqli_num_rows($sql)>0) 
  header('Location: Email.html'); 
      
  else 
  $sql = "insert into utilizador (nome,data_nasc,email,cep,morada,password) values ('$nome','$data_nasc','$email','$cep','$morada','$password')";
  $registar = mysqli_query($conexao,$sql);
  
  $linhas = mysqli_affected_rows($conexao); 
}
mysqli_close($conexao);

?>
<!DOCTYPE html>
<html lang ="en">
 <head>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="loading.css">
 </head>

 <body>

 <div class = "preload" id = "preload">
  <div class ="logo texto">
   Registo efetuado com sucesso... 
  </div>
   <div class = "loader-frame">
    <div class = "loader1" id = "loader1"></div>
    <div class = "loader2" id = "loader2"></div>
   </div>
 </div>

<script type="text/javascript">

(function(){
 
 var preload = document.getElementById("preload");
 var loading = 0;
 var id = setInterval(frame, 30);

 function frame(){
  if(loading == 100) {
   clearInterval(id);
   window.open("Inicio.php", "_self");
  }
  else {
   loading = loading + 1;
   if(loading == 90) {
    preload.style.animation = "fadeout 1s ease";
   }
  }
 }


})();


    </script>
 </body>



</html>