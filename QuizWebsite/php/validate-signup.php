<html>
<body>

<?php
include "db_connection.php";
$key = implode('-', str_split(substr(strtolower(md5(microtime().rand(1000, 9999))), 0, 30), 6));
$conn = OpenCon();

  $fname = mysqli_real_escape_string($conn,$_REQUEST['fname']);
  $email= mysqli_real_escape_string($conn,$_REQUEST['email']);
  $fpassword = mysqli_real_escape_string($conn,$_REQUEST['psw']);
  $hash = password_hash($fpassword,PASSWORD_DEFAULT);   

$sql = "INSERT INTO users (username, email, password,is_admin) VALUES ('$fname', '$email', '$hash', '0')";

if($conn->query($sql) === true){
    echo "Records inserted successfully.";
    echo "<br>API Key:" . $key;
    header("Location: ../login.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

CloseCon($conn);
?>

</body>
</html>

