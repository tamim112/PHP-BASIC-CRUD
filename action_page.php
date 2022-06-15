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

//for delete
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql = "DELETE FROM user_info WHERE id = '$id'";

	if (mysqli_query($conn, $sql)) {
	  header("Location: profile.php?id=".$id);
	} else {
	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
}
//for update
if(isset($_POST['update'])){
	$id=$_POST['update'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$psw=$_POST['psw'];
	$psw_repeat=$_POST['psw_repeat'];
	if($psw!=$psw_repeat){
		echo"<center>";
		echo"<h1>";
		echo"Password Does not Match";
		echo"</h1>";
		echo"<br>";
		echo"<h1>";
		echo"<a href=index.php>Back to Form</a>";
		echo"</h1>";
		echo"</center>";
	}else{
		$sql =" UPDATE user_info
				SET name ='$name', email = '$email', psw = '$psw', psw_repeat='$psw_repeat'
				WHERE id='$id'";

		if (mysqli_query($conn, $sql)) {
		  header("Location: profile.php?upid=".$id);
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}

//for insert

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$psw=$_POST['psw'];
	$psw_repeat=$_POST['psw_repeat'];
	if($psw!=$psw_repeat){
		echo"<center>";
		echo"<h1>";
		echo"Password Does not Match";
		echo"</h1>";
		echo"<br>";
		echo"<h1>";
		echo"<a href=index.php>Back to Form</a>";
		echo"</h1>";
		echo"</center>";
	}else{
		$sql = "INSERT INTO user_info (name, email, psw,psw_repeat)
		VALUES ('$name', '$email', '$psw','$psw_repeat')";

		if (mysqli_query($conn, $sql)) {
		  header("Location: profile.php");
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
}
mysqli_close($conn);
?>