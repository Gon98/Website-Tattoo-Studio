<!-------------Login---------->
<?php
session_start();
include ('conexao.php');

if(empty($_POST['email']) || empty($_POST['password'])) {
  header('Location: Inicio.php');
  exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$password = mysqli_real_escape_string($conexao, $_POST['password']);
$password = md5($_POST["password"]);
$query = "SELECT * FROM `utilizador` WHERE email = '{$email}' and password = '{$password}';";

$result = mysqli_query($conexao, $query);

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $_SESSION['email'] = $email;
    $_SESSION["uid"] = $row["utilizador_id"];
    $_SESSION["name"] = $row["nome"];
  }
 header('Location: InicioLogin2.php');
 exit();
}else {
header('Location: Inicio.php');
exit();
}
?>