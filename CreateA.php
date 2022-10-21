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
          font-size: 17px;
        }
        * {
          box-sizing: border-box;
        }
.bg-image {
/*background-image: url("images/image1.JPEG");*/
background-color: whitesmoke;
  filter: blur(8px);
  -webkit-filter: blur(8px);
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}  
a {
                        text-decoration: none;
                        background-color:darkgray; 
                        color: black;
                        font-weight: bold;
                        font-style: oblique;
                       text-decoration: underline;
                         }

                        a:hover {
                        text-decoration: none;
                        background-color:darkgray;
                        color:whitesmoke;
                        }
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: 1px inset lightgray;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
 border: 1px inset lightgray;
  margin-bottom: 25px;
}
button:focus{
	color: dodgerblue;
	background-color:white;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color:lightgray;
  color: gray;
  padding: 14px 20px;
  margin: 8px 0;
  border: 1px inset lightgray;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
 .signupbtn {
 width: 40%;
   margin:14px 30% auto;
   border: 4px outset #A9A9A9;
  background: lightgray;
  padding-top: 15px;
  margin-left: 25%;
  padding-bottom: 10px;
  font-size: 16px;
  font-weight: bold;
  float: left;
  
}

/* Add padding to container elements */
.Sign {
  padding: 16px;
  background-color: darkgray;
     border: 4px outset #A9A9A9; 
        padding: 1%;
        background-clip: padding-box;
        width:35%;
        height:87%;
  position: absolute;
  margin-top:13%;
  top: 25%;
  left: 50%;
  transform: translate(-50%, -50%); 
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
    </head>
<body>
    <div class="bg-image"></div>
    <form action="authentication.php" method="POST" style="border:1px solid #ccc">
  <div class="Sign">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
	<label for="name"><b>userName(db name):</b></label>
    <input type="text" placeholder="username..." name="userName" required>
    <label for="numtel"><b> Telephone number</b></label>
    <input type="text" placeholder="Telephone number..." name="Telnum" required>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder=" Email..." name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Password..." name="password" required>

    
    
    <p>By creating an account you agree to our <a href="#" >Terms & Privacy</a>.</p>

    <div class="clearfix">
      
      <input type="submit" class="signupbtn" name="valid" value="Sign Up">
    </div>
  </div>
</form>

</body>
   
</html>
 <?php 
 if (isset($_POST['valid'])) {

function is_valid_email($mail)
{
     if (empty($mail)) {
         echo "veuillez saisir votre email !!";
         return false;
     } else {
         $email = $mail;
         
         if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
             echo "Valid email";
             return true;}
         else   { 
           echo "Invalid email format !!"; 
           return false;
     } 
    }}
    function validpassword($ch) 
    {  
        $uppercase = preg_match('@[A-Z]@', $ch);
        $lowercase = preg_match('@[a-z]@', $ch);
        $number    = preg_match('@[0-9]@', $ch);
        $specialChars = preg_match('@[^\w]@', $ch);
    
        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($ch) < 8) 
        {
        echo 'Invalid password';
         return false;
        }
    
    else {
        return true;
        echo 'Valid password';
        }   

            
    }
 function insert_dbAdmin($username,$password,$servername,$nom,$email,$numclient,$numphone,$motdepass){
$BDadmin="nassima";

$adConn = new mysqli($servername, $username, $password,$BDadmin);
if($adConn === false){
    die("Connection failed: " . $conn->connect_error);
}
$sql1 = "INSERT INTO client (nom,numclient, email, motdepass,numphone) VALUES ('$nom','$numclient','$email','$motdepass',$numphone);";
if ($adConn->query($sql1) === TRUE) {

} else {
  header('Location:CreateA.php');
die("Connection failed: " . $conn->connect_error);
  //reate un fonction invalid
  //echo  " Error creating database: " . $adConn->error;
}
$adConn->close();}
// function 2
function create_DBclient($username,$servername,$password,$nom) {
  $conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql="CREATE DATABASE $nom";

if ($conn->query($sql) === TRUE) {



} else {

  echo  " Error creating database: " . $conn->error;
}

$conn->close();

}

$email=$_POST["email"];
$motdepass = $_POST['password'];
$vlidE=is_valid_email($email);
$validP=validpassword($motdepass);  
if ($validP===false||$vlidE===false) {
    header('Location:CreateA.php');
    die("Connection failed: " . $conn->connect_error);
}
  $nom = $_POST['userName'];
  $email =$_POST['email'];
  $motdepass = $_POST['password'];
  $numphone =(int)$_POST['Telnum'];
 $numclient = rand(1,99999).$nom;
$servername = "localhost";
  $username = "root";
  $password = "D139666247.nassima";
  create_DBclient($username,$servername,$password,$nom);
 insert_dbAdmin($username,$password,$servername,$nom,$email,$numclient,$numphone,$motdepass); 
 
require_once("ConnectionBD.php");
header('Location:Menu_Principal.php');
 }
?>