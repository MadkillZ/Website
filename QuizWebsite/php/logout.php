<?php
// setcookie(username, "", time() - 3600);
// print_r($_COOKIE);
if (isset($_COOKIE["username"])) {
    unset($_COOKIE["username"]);
    unset($_COOKIE["pref"]);
    unset($_COOKIE["api_key"]);
    unset($_COOKIE["rEmail"]);
    unset($_COOKIE["rPassword"]);
    unset($_COOKIE["userID"]); 
    setcookie("username", null, -1, '/');
    setcookie("pref", null, -1, '/');
    setcookie("api_key", null, -1, '/'); 
    header("Location: ../index.php");
    exit();
} else {
    header("Location: ../index.php");
    exit();
}
 ?>