<?php session_start();
$name = $_SESSION["userName"];
?><?php if (isset($_POST["deleted"])) {
    if (!$_POST["tableName2"]) {
        echo '<p1 class="error"> Error entre table name</p1> :';
        die("error");
    } 
    $name = $_SESSION["userName"];
    $servername = $_SESSION["servername"];
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    $conn = new mysqli($servername, $username, $password, $name);
    if ($conn->connect_error) {
        die("<p1>Connection failed: " . $conn->connect_error . "</p1>");
    }
    $table = $_POST["tableName2"];
    $sql = "DROP TABLE $table";
    if ($conn->query($sql) === true) {
        echo '<p1 class="error">  table '.$table.'is deleted </p1>';
    } else {
        echo '<p1 class="error"> Error the table does not exist : ' . $conn->error ."</p1>";
    }
    }
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
.tableName2{
  padding-top: 15px;
  height:12%;
    background-color:dimgrey;
    color:black;
    position:absolute;
    top:49%;
    left:66%;
    transform:translate3d(-60%,-30%,0);
    padding:40px 40px;
    text-align:center;
    border-radius:20px;
    font-size:8px;
   font-family: serif;
    }
    .inpT1{
      text-align: center;
    font-size:16px;
    background-color: darkgrey;
    border:4px outset #A9A9A9 ;
      width: 200px;
      height: 12px;padding-top: 4%;padding-bottom:7%
    }
.HEAD{
  height:10%;
  width:100%;
  position:fixed;
  top:0;
  left:0;
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
    .inpT2{
  width:200px;
  padding: 10px 10px;
  background:whitesmoke;
  height: 40px;
}
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
  /*cursor: pointer;*/
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
<main class="tableName2">
<form method="post" action="" >
  <input type="text" name="tableName2" class="inpT1" placeholder="Enter Table Name..."><br><br>
  <input type="submit" name="deleted" class="inpT1" value="Delete">
 </form>
</main>
</body>
</html>
