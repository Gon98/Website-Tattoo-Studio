<!DOCTYPE html>
<html lang ="en">
 <head>
  <meta charset = "utf-8">
  <link rel="stylesheet" type="text/css" href="loading.css">
 </head>

 <body>

 <div class = "preload" id = "preload">
  <div class ="logo texto">
   Erro Verificar se as palavras-passe são iguais... 
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