<?php $servername = "localhost";
  $username = "root";
  $password = "";
  $nom = $_POST['userName'];
  session_start();
  $_SESSION["servername"]=$servername;
  $_SESSION["username"]=$username;
  $_SESSION["password"]=$password;
  $_SESSION["userName"]=$nom;
$_SESSION["motdepass"]=$_POST['password'];
$conn = new mysqli($servername, $username, $password,$nom);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if(isset($_SESSION["userName"])){
$name=$_SESSION['userName'];
header('Location: Menu_Principal.php');}?>