<!-------------Vai Editar os dados---------->
<?php
include ('conexao.php');

error_reporting(0);
ini_set(“display_errors”, 0 );

if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
  $data_nasc = $_POST['data_nasc'];
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


      
 
  $query = "UPDATE utilizador SET  nome = '$nome', data_nasc = '$data_nasc', cep = '$cep', morada = '$morada', password = '$password' WHERE nome = '$nome'";
  $result = mysqli_query($conexao, $query);
  
  $linhas = mysqli_affected_rows($conexao); 
}


}
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
   A Guardar... 
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
 var id = setInterval(frame, 10);

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