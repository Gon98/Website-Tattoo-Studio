(function(){
 
    var preload = document.getElementById("preload");
    var loading = 0;
    //tempo
    var id = setInterval(frame, 30);
   
    function frame(){
      //loading quando acaba 
     if(loading == 100) {
      clearInterval(id);
      window.open("Inicio.php", "_self");
     }
     else {
      loading = loading + 1 ;
      if(loading == 90) {
       preload.style.animation = "fadeout 9s ease";
      }
     }
    }
   
   
   })();