<?php session_start();
$name = $_SESSION["userName"];
?>
<?php if (isset($_POST["valide4"])) {
$table=$_POST['tableName4'];
    if (!$table) {
        echo '<p1 class="error"> Error entre table name</p1> :';
        die("error");
        exit();
    }
    $name = $_SESSION["userName"];
    $servername = $_SESSION["servername"];
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    //$table = $_SESSION["table"];
    $conn = new mysqli($servername, $username, $password, $name);
    if ($conn->connect_error) {
        die("<p1>Connection failed: ".$conn->connect_error."</p1>");
    }
   
    $sqlUP= "UPDATE $table SET
    ".$_POST['nomattU1']."=".$_POST['con1'].",
    ".$_POST['nomattU2']."=".$_POST['con2'].",
    ".$_POST['nomattU3']."=".$_POST['con3'].",
    ".$_POST['nomattU4']."=".$_POST['con4'].",
    ".$_POST['nomattU5']."=".$_POST['con5']." WHERE ID = ".$_POST['ColName'].";";
    if ($conn->query($sqlUP) === true) {
        echo '<p1 class="error"> update in'.$table.' is done </p1>';
    } else {
        echo '<p1 class="error"> Error ' . $conn->error ."</p1>";
    }}
 ?><?php 
if (isset($_SESSION['userName'])) {
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
.tableName4{
   height:80%;
  width:73%;
    background-color:dimgrey;
    color:black;
    position:absolute;
    top:42%;
    left:55.8%;
    transform:translate3d(-40%,-30%,0);
    text-align:center;
    border-radius:20px;
    font-size:22px;
   font-family: serif;
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
  width: 160px;
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
  <form method="POST" action=""><div><input class="input" type="submit" name="LogOut" value="Log Out"></div></frame>
  <form method="POST" action=""><div ><input class="input" type="submit" name="AT" value="Add Table"></div></frame>
  <form method="POST" action=""><div><input class="input" type="submit" name="DT" value="Delete Table"></div></frame>
  <form method="POST" action=""><div><input class="input" type="submit" name="UT" value="Updet Table"></div></frame>
  <form method="POST" action=""><div><input class="input" type="submit" name="IIT" value="Inset Into Table"></div></frame>
  <form method="POST" action=""><div><input class="input" type="submit" name="DIT" value="Delete Into Table"></div></frame>
  <form method="POST" action=""><div><input class="input" type="submit" name="DST" value="Disply"></div></frame>
 </div>
</nav>
<main class="tableName4" >
<form method="post" action="" >
  <fieldset>
  <legend>Saisir les champs</legend>
  <label> Table Name        :
  <input type="text" name="tableName4" placeholder="Enter Table Name...">
  <label> Column ID       :
  <input type="text" name="ColName" placeholder="Enter Table Name...">
  <br><br>
    <label> nomAttribue1    :
    <input type="text" name="nomattU1" >
  </label>
    <label> new Content  1 :
    <input type="text" name="con1" >
  </label><br><br>
  <label> nomAttribue2    :
    <input type="text" name="nomattU2" >
  </label>
    <label> new Content  2 :
    <input type="text" name="con2" >
  </label><br><br>
  <label> nomAttribue3    :
    <input type="text" name="nomattU3" >
  </label>
    <label> new Content 3 :
    <input type="text" name="con3" >
  </label><br><br>
  <label> nomAttribue4    :
    <input type="text" name="nomattU4" >
  </label>
    <label> new Content 4  :
    <input type="text" name="con4" >
  </label><br><br>
    <label> nomAttribue5    :
    <input type="text" name="nomattU5" >
  </label>
    <label> new Content 5  :
    <input type="text" name="con5"  >
  </label>
  </fieldset>
  <input name="valide4" type="submit" value="Valider" >
  </form>
</main>
</body>
</html>
