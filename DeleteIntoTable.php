<?php session_start();
$name = $_SESSION["userName"];
?>
<?php if (isset($_POST["deletedCOL"])) {
    if (!$_POST["tableName7"]) {
        echo '<p1 class="error"> Error entre table name</p1> :';
        die("error");}
         if (!$_POST["ID7"]) {
        echo '<p1 class="error"> Error entre ID</p1> :';
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
    $table = $_POST["tableName7"];
    $sql = 'DELETE FROM '.$table.' WHERE ID= '.$_POST['ID7'].';';
    if ($conn->query($sql) === true) {
        echo '<p1 class="error">  column '.$_POST['ID7']." is deleted </p1>";
    } else {
        echo '<p1 class="error"> Error: ' . $conn->error ."</p1>";
    }
 } ?><?php $_SESSION['reply'] = "028";
if (isset($_SESSION['reply'])) {
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
.tableName7{
   height:30%;
   width:20%;
    background-color:dimgrey;
    color:black;
    position:absolute;
    top:49%;
    left:66%;
    transform:translate3d(-60%,-30%,0);
    padding:30px 20px;
    text-align:center;
    border-radius:20px;
    font-size:8px;
    padding-right:4%;
    padding-left:4%;
   font-family: serif;

    }
    .inpT7{
       margin: 8px 0;
      text-align: center;
    font-size:16px;
    background-color: darkgrey;
    border:4px outset #A9A9A9 ;
      width:230px;
      height: 12px;
      padding-top: 3%;
     /* padding-right: 5%;
      */padding-bottom:7%
    }
    label{
       font-size:25px;

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
<main class="tableName7">
<form method="post" action="" >
  <label>Table Name :</label>
  <input type="text" name="tableName7" class="inpT7" placeholder="Enter Table Name..."><br>
  <label>ID of the column :</label>
  <input type="text" name="ID7" class="inpT7" placeholder="Enter ID ..."><br>
  <input type="submit" name="deletedCOL" class="inpT7" value="Delete">
 </form>
</main>
</body>
</html>
