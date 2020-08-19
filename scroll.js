
//Vai buscar o botao
var mybutton = document.getElementById("myBtn");

// Quando o utilizador der scroll para baixo 20px do top vai aparecer o botao
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// Quando o utilizador clicar no botao vao para o top 
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
