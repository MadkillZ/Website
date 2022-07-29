<html>

<body>
    <?php
    include "db_connection.php";
    $conn = OpenCon();
    $username = $_REQUEST['username'];
    $fpassword = mysqli_real_escape_string($conn, $_REQUEST['password']);
    $hashPass = password_hash($fpassword, PASSWORD_BCRYPT);

    //echo $username."<br>";
    $sql = "SELECT username,password FROM users WHERE email = '$username'";
    $retval = mysqli_query($conn, $sql);
    if (!$retval) {
        die('Could not get data: ' . mysqli_error($conn));
    }
    //echo "Fetched data successfully<br>";
    $row = mysqli_fetch_array($retval, MYSQLI_ASSOC);
    $rPassword = "{$row['password']}";
    // $rKey = "{$row['api_key']}";
    $rName = "{$row['username']}";
    $rID = "{$row['user_id']}";
    // echo "EMP Password :$rPassword  <br> ".
    // echo "Api_key : $rKey <br> ";
    if (password_verify($fpassword, $rPassword)) {
        //echo "Username: ".$username;
        setcookie("username", $rName, time() + (86400 * 30), "/");
        setcookie("rEmail", $username, time() + (86400 * 30), "/");
        setcookie("rPassword", $rPassword, time() + (86400 * 30), "/");
        setcookie("userID", $rID, time() + (86400 * 30), "/");
        // setcookie("api_key", $rKey, time() + (86400 * 30), "/");
        echo "alert('Testing!')";
        header("Location: ../home.php");
    } else {
        header("Location: ../login.php");
    }
    CloseCon($conn);
    if (!isset($_COOKIE["username"])) {
        echo "Cookie named '" . "username" . "' is not set!";
    } else {
        echo "Value is: " . $_COOKIE["username"];
    }
    //print_r($_COOKIE);
    ?>
</body>

</html>