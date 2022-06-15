<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<style>

/* Add padding to containers */
.btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 25%;
  opacity: 0.6;
  transition: 0.3s;
  margin: 2% 10% 10% 60%;
  position: absolute;
  top: 0%;
  transform: translateY(-50%);
}
.btn:hover {opacity: 1}



</style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Basic</title>

  </head>
  <body>
<div>
<center>
<h1>USER INFO</h1>
</center>
</div>
<br>
  <div class="btn">
	<form method="get" action="index.php">
		<button type="submit" id="btn">Create User Again</button>
	</form>
	
  </div>
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
	 echo "Successfully Deleted";
}
if(isset($_GET['upid'])){
	 echo "Successfully Updated";
}

$query  = "SELECT * FROM user_info";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo '<table width="800" border="1" align="center">';
	echo  "<tr>".
        "<td>"."<b>"."Name"."</b>"."</td>".
        "<td>"."<b>"."Email"."</b>"."</td>".
        "<td>" ."<b>"."Password"."</b>"."</td>".
		"<td>" ."<b>"."Update"."</b>"."</td>".
		"<td>" ."<b>"."Delete"."</b>"."</td>".
		"</tr>";	
		
    while($row = $result->fetch_assoc()) {
      //  echo "<br>"."Product_Id: ". $row["Product_Id"]. "Product_Name: ". $row["Product_Name"]. " Price" . $row["Price"] ."Quantity".$row["Quantity"]."<br>";
     
      echo  "<tr>".
        "<td>".$row['name']."</td>".
        "<td>". $row['email']. "</td>".
        "<td>" .$row['psw']. "</td>".
		"<td>".'<a href="index.php?id='.$row['id'].'">EDIT</a>'."</td>".
		"<td>".'<a href="action_page.php?id='.$row['id'].'">Delete</a>'."</td>"
		."</tr>"."</br>";	
    }
	 echo '</table>';
} else {
    echo "0 results";
}

?>

  </body>
</html>