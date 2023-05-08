<?php
$Username = $_POST['uname'];
$password = $_POST['psw'];

//Database connection
$conn = new mysqli('localhost', 'root', 'test');
if($conn->connect_error){
  die('Connection Failed : '.$conn->connect_error);
}else{
  $stmt = $conn->prepare("insert into Userdata(Username, password) values(?, ?)");
  $stmt->bind-param("ss", $Username, $password);
  $stmt->execute();

  $stmt->close();
  $conn->close();
}


 ?>
