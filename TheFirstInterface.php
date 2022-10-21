<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    <title>MyApp</title>
        <style type="text/css">
        body, html {
          height: 100%;
          margin: 0;
          font-family: Arial, Helvetica, sans-serif;
        }
        * {
          box-sizing: border-box;
        }
    .container{
        margin-top: 10%;
       }
    .Connect {
       background-color:darkgray;
        
        border: 4px outset grey; 
        padding: 5%;
        background-clip: padding-box;
        width:40%;
        height:70%;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);      


}
.bg-frame {
  background-color:whitesmoke;
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.btn {
    width: 40%;
   margin:14px 30% auto;
   border: 4px outset #A9A9A9;
  background: lightgray;
  padding-top: 15px;
  margin-left: 25%;
  padding-bottom: 10px;
  font-size: 16px;
  font-weight: bold;
}
input[type=text], input[type=password] {
    font-weight: bold;
    width: 60%;
    padding: 15px;
    margin: 14px 0 28px 0;
  display: inline-block;
  border: 3px inset #A9A9A9;
  background: lightgray;
  font-size:16px;
}
input[type=text]:focus, input[type=password]:focus {
  background-color:dimgray;
  outline: none;
}
#log_in{
margin-top:-5%;
margin-left:30%;
}
</style>
    </head>
<body>
    <div class="bg-frame"></div>
    <div class="Connect">
        <h1 id="log_in">Login:</h1>
        <form  method="POST" class="container">
    
    <label for="username"><b>UserName:</b></label>
    <input type="text" placeholder="userName" name="userName" required>
<br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
<br>
    <input type="submit" class="btn" name="login" value="log in"> 
    </form> 
    
    <form method="POST" action="CreateA" >
    <div class="creatA">
        <input type="submit" class="btn" name="creatA" value=" Create Acount ">
    </div>
    </form>
    </div>
</body>
   
</html> 
<?php 
if (isset($_POST['login'])) {
$servername = "localhost";
  $username = "root";
  $password = "D139666247.nassima";
$nom=$_POST['userName'];
$motdepass=$_POST['password'];
$BDadmin="nassima";

$adConn = new mysqli($servername, $username, $password,$BDadmin);
if($adConn === false){

    die("Connection failed: " . $adConn->connect_error);
}
$sql = "SELECT nom,motdepass FROM client where nom='$nom' and motdepass='$motdepass'";
$result = $adConn->query($sql);
$row = $result->fetch_array(MYSQLI_BOTH);
if($row['nom']==$nom && $row['motdepass']==$motdepass)
{
      
}else{

  die("Connection failed: " . $adConn->connect_error);
}
$adConn->close();
function getbdname(){
    return $nom; 
}
require_once("ConnectionBD.php");
header('Location: Menu_Principal.php'); 

}   






 ?>