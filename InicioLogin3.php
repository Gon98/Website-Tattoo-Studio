<?php
session_start();
include('Verificar_login.php');
?>
<!-------------Vai buscar os dados---------->
<?php
include ('conexao.php');
$email = $_SESSION['email'];
$query = "SELECT * FROM `utilizador` WHERE email = '$email'";
$result = mysqli_query($conexao, $query);
$array = mysqli_fetch_array($result);
?>
<!-------------HTML---------->
<!DOCTYPE html>
<html lang="pt">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="menu.css">
<link rel="stylesheet" type="text/css" href="slide.css">
<link rel="stylesheet" type="text/css" href="fontes.css">
<link rel="stylesheet" type="text/css" href="trabalhos.css">
<link rel="stylesheet" type="text/css" href="scroll.css">
<link rel="stylesheet" type="text/css" href="estudio.css">
<link rel="stylesheet" type="text/css" href="sobre.css">
<link rel="stylesheet" href="fazemos.css">
<link rel="stylesheet" href="tatuadores.css">
<link rel="stylesheet" type="text/css" href="footer.css">
<link rel="stylesheet" type="text/css" href="registar.css">
<link rel="stylesheet" type="text/css" href="login.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
<!-------------Icon do Site---------->
<link rel="apple-touch-icon" sizes="57x57" href="Imagens/SiteIcon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="Imagens/SiteIcon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="Imagens/SiteIcon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="Imagens/SiteIcon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="Imagens/SiteIcon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="Imagens/SiteIcon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="Imagens/SiteIcon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="Imagens/SiteIcon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="Imagens/SiteIcon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="Imagens/SiteIcon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="Imagens/SiteIcon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="Imagens/SiteIcon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="Imagens/SiteIcon/favicon-16x16.png">
        <link rel="manifest" href="Imagens/SiteIcon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
<head>
    <!-------------Linha---------->
    <title>Rock - Tattoo Studio - INICIO</title>
</head>

<body>
    <!----Inicio----->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="Imagens/scroll.png" height="25" width="30"></button>
    <nav>
        <div class="logo">
            <img src="Imagens/Logo.png" alt="Smiley face" height="80" width="250">
        </div>
        <ul class="nav-links">
            <li>
                <a class="active" href="#">Início</a>
            </li>
            <li>
                <a class="clicar" href="loja/perfil.php">Loja</a>
            </li>
            <li>
                <a class="clicar" href="mailto:rocktattoostudio2019@gmail.com">Marcações</a>
            </li>
            <li>
                <a class="clicar" href="#modal2">Perfil</a>
            </li>
            <li>
                <a class="clicar" href="Logout.php">Sair</a>
            </li>

        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

    <script src="menu.js">
    </script>
    <!------------Meio------------->
    <!----Slaide----->
    <div class="slide-container">
                <div class="effect slide">
                    <img src="Imagens/Tatuagem 1.jpg">
                </div>
                <div class="effect slide">
                    <img src="Imagens/Tatuagem 2.jpg">
                </div>
                <div class="effect slide">
                    <img src="Imagens/Tatuagem 3.jpg">
                </div>
          </div>
        <div class="dot-container">
            <span></span>
            <span></span>
            <span></span>
        </div>
<script src="slide.js"></script>
<!----Menu com os Trabalhos----->
<div class="titulo">
NOSSO TRABALHO 
</div>
<div class="xop-section">
<div class="retangulo">

  <ul class="xop-grid">
  <li>
    <div class="xop-box xop-img-1">
        <div class="xop-info">
            <a href="GeometriaLogin.php" class="nounderline"Texto do link</a>
        <h3>Geometria / Linha</h3>
        </a>
      </div>
    </div>
  </li>
  <li>
      <div class="xop-box xop-img-2">
          <div class="xop-info">
              <a href="CizentoLogin.php" class="nounderline"Texto do link</a>
          <h3>PRETO E CIZENTO</h3>
        
          </a>
        </div>
      </div>
    </li> 
    <li>
        <div class="xop-box xop-img-3">
            <div class="xop-info">
                <a href="LetrasLogin.php" class="nounderline"Texto do link</a>
            <h3>LETRAS</h3>
      
            </a>
          </div>
        </div>
      </li> 
      <li>
          <div class="xop-box xop-img-4">
              <div class="xop-info">
                  <a href="CoresLogin.php" class="nounderline"Texto do link</a>
              <h3>Cores</h3>
      
              </a>
            </div>
          </div>
        </li>  
        <li>
            <div class="xop-box xop-img-5">
                <div class="xop-info">
                    <a href="IlustracaoLogin.php" class="nounderline"Texto do link</a>
                <h3>Ilustração</h3>
     
                </a>
              </div>
            </div>
          </li> 
          <li>
              <div class="xop-box xop-img-6">
                  <div class="xop-info">
                      <a href="TradicionalLogin.php" class="nounderline"Texto do link</a>
                  <h3>Tradicional</h3>
        
                  </a>
                 
                </div>
              </div>
            </li> 
       
  </ul>
  </div>
  </div>
<!----Sobre o Estudio----->
  <div class="estudio-section">
    <div class="retangulo2">
      <ul class="estudio-grid">
      <li>
        <div class="estudio-box estudio-img-1">
            <div class="estudio-info">
                <a href="#" class="nounderline"Texto do link</a>
           
            </a>
          </div>
        </div>
      </li>
      <li>
            <div class="estudio-info">
    
                  <h3>O Nosso Estudio</h3>
                  <p>Durante todo o ano poderão ter uma experiência única 
                    e profissional com os nossos artistas. A equipa Rock Tattoo oferece um serviço que se 
                    destaca pela qualidade e atendimento cuidado 
                    com os nossos clientes.</p>
          </div>
      </li>   
      </ul>
      </div>
      </div>
<!----O que nos fazemos----->
      <div class="services-section">
      <div class="retangulo3">
      <div class="inner-width">
        <h1 class="section-title">O QUE NÓS FAZEMOS</h1>
        <div class="border"></div>
        <div class="services-container">
          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-paint-roller"></i>
            </div>
            <div class="service-title">Cobertura</div>
            <div class="service-desc">
              Cansado da tua tatuagem antiga? Da-lhe uma nova vida com um melhoramento ou cria uma nova peça para a cobrir.
            </div>
          </div>
          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-pencil-ruler"></i>
            </div>
            <div class="service-title">Criação</div>
            <div class="service-desc">
              Criamos com a tua ideia uma ilustração. Para mais informações sobre este serviço consulte o nosso estudio no Porto.
            </div>
          </div>
          <div class="service-box">
            <div class="service-icon">
              <i class="fas fa-syringe"></i>
            </div>
            <div class="service-title">Tatuagem</div>
            <div class="service-desc">
              A equipa da Rock Studio oferece a possibilidade de tatuares a tua ideia personalizada.
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
	<!----Artistas----->
    <div class="titulo">
Nossos Artistas
</div>
<div class="tatuadores-section">
    <div class="retangulo4">
      <ul class="tatuadores-grid">
      <li>
        <div class="tatuadores-box tatuadores-img-1">
            <div class="tatuadores-info">
                <a href="Tatuador1Login.php" class="nounderline"Texto do link</a>
            <h3>GONÇALO ROCHA</h3>
            </a>
          </div>
        </div>
      </li>
      <li>
          <div class="tatuadores-box tatuadores-img-2">
              <div class="tatuadores-info">
                  <a href="Tatuador2Login.php" class="nounderline"Texto do link</a>
              <h3>BEATRIZ MATEUS</h3>
            
              </a>
            </div>
          </div>
        </li> 
        <li>
            <div class="tatuadores-box tatuadores-img-3">
                <div class="tatuadores-info">
                    <a href="Tatuador3Login.php" class="nounderline"Texto do link</a>
                <h3>GABRIELA CARDOSO</h3>
          
                </a>
              </div>
            </div>
          </li>  
      </ul>
      </div>
      </div>
 <!----Sobre Nos----->
		<footer class="footer-distributed">
 
 <div class="footer-left">
  
   <h3>Sobre<sp>Nós</sp></h3>

   <p class="footer-links">
     <a>Localização</a>
     |
     <a>Telemóvel</a>
     <br>
     
     <a>Email</a>
     |
     <a>Redes Sociais</a>
   </p>
 </div>
 <div class="footer-center">
   <div>
     <i class="fa fa-map-marked-alt"></i>
       <p><sp>LARGO SOARES DOS REIS - NR. 50</sp>
         VILA NOVA DE GAIA</p>  
   </div>
   <div>
     <i class="fa fa-phone"></i>
     <p>932 - 344 - 543</p>
   </div>
   <div>
     <i class="fa fa-envelope"></i>
     <p><a href="mailto:rocktattoostudio2019@gmail.com">rocktattoostudio2019@gmail.com</a></p>
   </div>
 </div>
 <div class="footer-right">
   <p class="footer-company-about">
     <sp>Redes Sociais</sp>
     Segue as nossas redes sociais para estares a par de todos os nossos trabalhos e promoções.</p>
   <div class="footer-icons">
     <a href="https://www.facebook.com/Rock-Tattoo-Studio-104281754347227/?modal=admin_todo_tour"><i class="fab fa-facebook"></i></a>
     <a href="https://www.instagram.com/explore/tags/rocktattoostudio/"><i class="fab fa-instagram"></i></a>
     <a href="https://www.youtube.com/channel/UCNqJ7c9b5E4Y3uw7Bf0w4eA?view_as=subscriber"><i class="fab fa-youtube"></i></a>
   </div>
 </div>
</footer>
<!----Footer----->
<div class="retangulo5">
			<div class="footer">
        <br><br>
					RockStudio © 2016 All Rights Reserved.<br>Daneissil
   
			</div>
    </div>
<!----Perfil----->
<div class="modal2" id="modal2">
                    <div class="modal2__content">     
        <div class="box">
            <h2>Perfil</h2>
            <a href="InicioLogin2.php#modal2" class="close"></a>
            <form class="" action="Editar3.php" method="post">
            <div align="center">
            <img src="Imagens/perfil2.png" style="width:100px;height:100px;">
            </div>
            <div class="inputBox">
      <div class="perfil">Nome</div>
               <input type="text" name="nome" maxlength="40" required  readonly value="<?php echo $array['nome'];?>">
           </div>
      
           <div class="inputBox">
      <div class="perfil">Data Nascimento</div>
               <input type="date" name="data_nasc" required readonly value="<?php echo $array['data_nasc'];?>">
           </div>
           <div class="inputBox">
      <div class="perfil">E-MAIL</div>
               <input type="email" name="email" maxlength="50" required readonly value="<?php echo $array['email'];?>">
           </div>
      <div class="inputBox">
      <div class="perfil">Codido Postal</div>
               <input type="text" id="cep" name="cep"  maxlength="8" required value="<?php echo $array['cep'];?>">
               <script src="cp.js">
    </script>
              </div>
   
           <div class="inputBox">
      <div class="perfil">Morada</div>
               <input type="text" name="morada" maxlength="50" required value="<?php echo $array['morada'];?>">
           </div>
           <div class="inputBox">
      <div class="perfil">Palavra-Passe(nova)</div>
               <input type="password" name="password"  required ">
           </div>
                <input  href="#" type="submit" name="submit" value="Editar">
            </form>
            
        </div>
        
        <script src="registar.js"> </script>
</div>
</div>

    <!----Fim----->
    <script src="scroll.js">
  </script>
</body>

</html>