<?php
$Username = $_POST['uname'];
$password = $_POST['psw'];

//Database connection
if (!empty($Username) || !empty($password)){
  $host = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbname = "homicide_userdata";
  //create connection
  $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

  if (mysqli_connect_error()){
    die('Connect Error('. mysqli_connect_error(),')'. mysqli_connect_error());
  } else {
    $SELECT = "SELECT Username From Userdata Where Username = ? Limit 1";
    $INSERT = "INSERT Into Userdata (Username, password) values(?, ?)";


    //Prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $Username);
    $stmt->execute();
    $stmt->bind_result($Username);
    $stmt->store_result();
    $rnum = $stmt->num_rows;

    if ($rnum==0){
      $stmt->close();

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ss", $Username, $password);
      $stmt->execute();

    } 
    $stmt->close();
    $conn->close();
  }
} else {
  echo "All fields are required";
  die();
}

 ?>

