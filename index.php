<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus,input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
/* Add padding to containers */

.btn2 {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  margin: -2% 0% 10% 40%;
  position: absolute;
  transform: translateY(-50%);
  text-align:center;
  opacity: 0.6;
  transition: 0.3s;
}
.btn2:hover {opacity: 1}

</style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Basic</title>
  </head>
  <body>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prac";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_GET['id'])){
	
$id=$_GET['id'];
$query  = "SELECT * FROM user_info Where id='$id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$_POST['name']=$row['name'];
$_POST['email']=$row['email'];
$_POST['psw']=$row['psw'];
}else{
$_POST['name']='';
$_POST['email']='';
$_POST['psw']='';
}
?>

  <form action="action_page.php"  method="post" >
	<div class="container">
    <h1>Create User</h1>
	<a href="profile.php" class="btn2">View User Info </a>
    <hr>
	<label for="name"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Your Name" name="name" id="name" value="<?php echo $_POST['name'];?>"  required > 
	<br>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php echo $_POST['email'];?>"  required>
	<br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" value="<?php echo $_POST['psw'];?>" required>
	<br>
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw_repeat" id="psw-repeat" required>
    <br>
   <?php 
   if(!empty($id)){
	   echo '<button type="submit" class="registerbtn" name="update" value='.$id.'>Update</button>';
   }else{
		echo '<button type="submit" class="registerbtn" name="submit">Register</button>';
   }
   ?>
  </div>
  
  </div>
</form>

  </body>
</html>