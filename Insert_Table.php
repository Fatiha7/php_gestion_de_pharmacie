<?php session_start();
$name = $_SESSION["userName"];
?>

<?php if (isset($_POST["valide3"])) {
    if (!$_POST["tableName3"]) {
        echo '<p1 class="error"> Error entre table name</p1> :';
        die("error");
        exit(); }
        $table=$_POST["tableName3"];
        //.$_POST['nomattI4']
    $name = $_SESSION["userName"];
    $servername = $_SESSION["servername"];
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $conn = new mysqli($servername, $username, $password, $name);
    if ($conn->connect_error) {
        die("<p1>Connection failed: " . $conn->connect_error . "</p1>");
    }
    $ID = rand(1,99999).$_POST['nomattI4'];
    $sqlIN=" INSERT INTO $table VALUES ($ID , ". $_POST['nomattI1']." , ".$_POST['nomattI2']." , ".$_POST['nomattI3']." , ".$_POST['nomattI4']." , ".$_POST['nomattI5'].");";
    if ($conn->query($sqlIN) === true) {
        echo '<p1 class="error">  table $table is created </p1>';
    } else {
        echo '<p1 class="error"> Error the table exists enter another name : ' .
            $sqlIN .
            "</p1>";
    }
} 
?><?php if (isset($_SESSION["userName"])) {
     $name = $_SESSION["userName"];
     if (isset($_POST["DT"])) {
         header("Location:DeleteTable.php");
     }
     if (isset($_POST["AT"])) {
         header("Location:insertTN.php");
     }
     if (isset($_POST["UT"])) {
         header("Location: Updale_Table.php");
     }
     if (isset($_POST["IIT"])) {
         header("Location:Insert_Table.php");
     }
     if (isset($_POST["DIT"])) {
         header("Location:DeleteIntoTable.php");
     }
     if (isset($_POST["DST"])) {
         header("Location:Afficher_Table.php");
     }
     if (isset($_POST["LogOut"])) {
         header("Location:LogOut.php");
     }
 } ?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <style type="text/css">
  body{
  background-color: white;
  margin:0;
  font-family:serif;
  color:black;
}
.error{
  top:15%;
    left:30%;
    font-size:22px;
    position:absolute;
}
.tableName3{
   height:80%;
  width:70%;
    background-color:dimgrey;
    color:black;
    position:fixed;
    top:43%;
    left:55.8%;
    transform:translate3d(-40%,-30%,0);
    text-align:center;
    border-radius:20px;
    font-size:22px;
   font-family: serif;
    }
    .inpT{
    text-align: center;
    font-size:22px;
  padding-left: 22px;
    background-color: darkgrey;
    border:4px outset #A9A9A9 ;
      width: 400px;
      height: 50px;
     }
      input{
   background:grey;
    color: black;
  padding: 14px 20px;
  margin: 8px 0;
  cursor: pointer;
 margin-left: 5%;
  opacity: 0.9;
  width: 90%;
  height: 100%;
}   
fieldset {
  margin-bottom: 20px;
  padding: 10px;
}
legend {
  padding: 6px 3px;
  font-weight: bold;
  font-variant: small-caps;
}
input[type=submit] {
  width: 350px;
  padding: 10px 10px;
  background:whitesmoke;
  height: 45px;
}
input[type=text] {
   color: black;
  width: 190px;
  height: 20px;
  padding: 10px;
  background:grey;
}
  input:focus {
  background-color:darkgrey;
  outline: none;
} 
.HEAD{
  height:10%;
  width:100%;
  position:fixed;
  top:0;
  left:0;
  color: black;
  outline:none;
}
.menu{
  background:grey;
  height:100%;
  width:25%;
  position:fixed;
  top:10%;
  left:0;
  border:4px outset grey;
  outline:none;
  } 
  .avatar{
    background:rgba(0,0,0,0.1);
    padding:15% 15%;
    border: 2px outset grey;
    text-align:center;
    height:15%;
    position:relative;
    }
    img{
      width:50%;
      border-radius:100%;
      overflow:hidden;
      box-shadow:0 0 0 5px rgba(255,255,255,0.2);
    }
  
  .inp{
    width:100%;
    height:100%;
    position: relative;
  }
  .input{
  width: 350px;
  padding: 10px 3px;
  background:whitesmoke;
  height: 45px;
  margin: 8px 0;
  border: 1px inset darkgrey;
  margin-left: 4%;
  background: #f1f1f1;
}
  .input:focus {
  background-color:darkgrey;
  outline: none;
} 
</style>
</head>
<body>
<header class="HEAD"></header>
<nav class="menu" tabindex="0">
  <div class="smartphone-menu-trigger"></div>
  <header class="avatar">
    <img src="images/image2.jpg" />
    <h2><?php echo "$name"; ?></h2>
  </header>
  <div class="Activite" >
  <form method="POST" action=""><div><input class="input" type="submit" name="Settings" value="Settings"></div></frame>
  <form method="POST" action=""><div ><input class="input" type="submit" name="AT" value="Add Table"></div></frame>
  <form method="POST" action=""><div><input class="input" type="submit" name="DT" value="Delete Table"></div></frame>
  <form method="POST" action=""><div><input class="input" type="submit" name="UT" value="Updet Table"></div></frame>
  <form method="POST" action=""><div><input class="input" type="submit" name="IIT" value="Inset Into Table"></div></frame>
  <form method="POST" action=""><div><input class="input" type="submit" name="DIT" value="Delete Into Table"></div></frame>
  <form method="POST" action=""><div><input class="input" type="submit" name="DST" value="Disply"></div></frame>
 </div>
</nav>
<main class="tableName3" disabled="disabled">
<form method="post" action="" >
  <fieldset>
  <legend>Saisir les champs</legend>
  <label>Table Name   :
  <input type="text" name="tableName3" placeholder="Enter Table Name...">
  <br><br>
    <label> column1    :
    <input type="text" name="nomattI1" >
  </label><br><br>
  <label>   column2    :
    <input type="text" name="nomattI2" >
  </label><br><br>
  <label>   column3    :
    <input type="text" name="nomattI3" >
  </label><br><br>
  <label>   column4    :
    <input type="text" name="nomattI4" >
  </label><br><br>
  <label>   column5    :
    <input type="text" name="nomattI5" >
  </label>
  </fieldset>
  <input name="valide3" type="submit" value="Valider" required>
  </form>
</main>
</body>
</html>