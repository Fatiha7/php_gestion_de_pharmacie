<?php session_start();
$name = $_SESSION["userName"];
?>
<?php if (isset($_POST["valide1"])) {
    if (!$_POST["tableName1"]) {
        echo '<p1 class="error"> Error entre table name</p1> :';
        die("error");
        exit();
        $table=$_POST['tableName1'];
        $_SESSION['table']=$table;
    } 
    $name = $_SESSION["userName"];
    $servername = $_SESSION["servername"];
    $username = $_SESSION["username"];
    $password = $_SESSION["password"];
    //$table = $_SESSION["table"];
    $conn = new mysqli($servername, $username, $password, $name);
    if ($conn->connect_error) {
        die("<p1>Connection failed: " . $conn->connect_error . "</p1>");
    }$table=$_POST['tableName1'];
    $sql="CREATE TABLE $table( ID varchar(40) ,
        ".$_POST['nomatt1']." ".$_POST['type1'].",
        ".$_POST['nomatt2']." ".$_POST['type2'].",
        ".$_POST['nomatt3']." ".$_POST['type3'].",
        ".$_POST['nomatt4']." ".$_POST['type4'].",
        ".$_POST['nomatt5']." ".$_POST['type5']."
                       )";
    if ($conn->query($sql) === true) {
        echo '<p1 class="error">  table '.$table.' is created </p1>';
    } else {
        echo '<p1 class="error"> Error the table exists enter another name : '.$conn->error."</p1>";
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
    position:fixed;
}
.tableName1{
   height:85%;
  width:70%;
    background-color:dimgrey;
    color:black;
    position:fixed;
    top:46%;
    left:55.8%;
    transform:translate3d(-40%,-30%,0);
    text-align:center;
    border-radius:20px;
    font-size:22px;
   font-family: serif;
    }
    .InsetTN{
   background:grey;
    color: black;
  padding: 10px 20px;
  margin: 8px 0;
  cursor: pointer;
 margin-left: 5%;
  opacity: 0.9;
  position: relative;
  color: black;
  width: 200px;
  height: 22px;
  padding: 10px;
  background:grey;
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
  margin: 8px 0;
  background:whitesmoke;
  height: 45px;
  color: black;
 cursor: pointer;
 margin-left: 5%;
  opacity: 0.9;
}
.InsetTN {
   color: black;
  width: 200px;
  height: 24px;
  padding: 7px;
  position: static;
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
<main class="tableName1" disabled="disabled">
<form method="post" action="" >
  <fieldset>
  <legend>Saisir les champs</legend>
  <label> Table Name        :
  <input type="text" name="tableName1" class="InsetTN" placeholder="Enter Table Name...">
  <br>
    <label> nomAttribue1    :
    <input type="text" name="nomatt1" class="InsetTN">
  </label>
      typeAtt1     :
  <input type="text" name="type1" class="InsetTN"><br><br>
    </label>
  <label> nomAttribue2    :
    <input type="text" name="nomatt2" class="InsetTN" >
  </label>
      typeAtt2     :
  <input type="text" name="type2" class="InsetTN"><br><br>
    </label>
  <label> nomAttribue3    :
    <input type="text" name="nomatt3" class="InsetTN" >
  </label>
      typeAtt3     :
  <input type="text" name="type3"class="InsetTN"><br><br>
    </label>
  <label> nomAttribue4    :
    <input type="text" name="nomatt4" class="InsetTN" >
  </label>
      typeAtt4     :
  <input type="text" name="type4" class="InsetTN"><br><br>
    </label>
    <label> nomAttribue5    :
    <input type="text" name="nomatt5" class="InsetTN" >
  </label>
      typeAtt5    :
  <input type="text" name="type5" class="InsetTN"><br><br>
    </label>
  </fieldset>
  <input name="valide1" type="submit" value="Valider" required>
  </form>
</main>
</body>
</html>
