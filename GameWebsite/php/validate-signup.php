<html>
<body>

<?php
include "db_connection.php";
$key = implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
$conn = OpenCon();

  $fname = mysqli_real_escape_string($conn,$_REQUEST['fname']);
  $surname= mysqli_real_escape_string($conn,$_REQUEST['fsurname']);
  $email= mysqli_real_escape_string($conn,$_REQUEST['email']);
  $fpassword = mysqli_real_escape_string($conn,$_REQUEST['psw']);
  $hash = password_hash($fpassword,PASSWORD_DEFAULT);   

$sql = "INSERT INTO Users VALUES ('$fname', '$surname', '$email', '$hash','$key')";

if($conn->query($sql) === true){
    echo "Records inserted successfully.";
    echo "<br>API Key:" . $key;
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

CloseCon($conn);
?>

</body>
</html>

