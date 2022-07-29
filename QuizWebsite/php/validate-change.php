<?php
    include "db_connection.php"; 
    $conn = OpenCon();

    $email = mysqli_real_escape_string($conn,$_REQUEST['email']); 
    $username = mysqli_real_escape_string($conn,$_REQUEST['username']);
    if(isset($_REQUEST['prevEmail'])){
      $pEmail = $_REQUEST['prevEmail']; 
      $pUsername = $_REQUEST['prevUsername'];  
    }else{
      $pEmail = $_COOKIE['rEmail']; 
      $pUsername = $_COOKIE['username'];
    }
    
    $sql = "UPDATE users SET username='$username' WHERE email='$pEmail'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        if(!isset($_REQUEST['prevEmail'])){
          setcookie("username", $username, time() + (86400 * 30), "/");
       }
      } else {
        if(strpos($conn->error, "username")!== false){
            echo "Username Taken";
        }
        else{
            //echo "Email Taken";
        }
      }

      $sql = "UPDATE users SET email='$email' WHERE username='$username'";
      if ($conn->query($sql) === TRUE) {
        if(!isset($_REQUEST['prevEmail'])){
          setcookie("rEmail", $email, time() + (86400 * 30), "/");
        }
        //echo "Record updated successfully";
      } else {
        if(strpos($conn->error, "email")!== false){
            //echo "email Taken";
        }
        else{
            //echo "Email Taken";
        }
      }
    // setcookie("username", $username, time() + (86400 * 30), "/");
    // setcookie("rEmail", $email, time() + (86400 * 30), "/");
    CloseCon($conn);
