<?php
include "db_connection.php";
$id = $_GET['superglobal'];
$cookiee1 = $_COOKIE["rEmail"];
$cookiee2 = $_COOKIE["rPassword"];
$mysqli = OpenCon();
$query = "SELECT * FROM users WHERE email = '$cookiee1' AND password = '$cookiee2'";
$res = $mysqli->query($query);
if ($row = mysqli_fetch_array($res)) {
    $userID = $row['user_id'];
}

//echo "Quiz_ID: " . $quizID."<br>";
$sql = "INSERT INTO tbpersonal (user_id, quiz_id)
    VALUES ('$userID', '$id')";
if (mysqli_query($mysqli, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}

CloseCon($mysqli);
header("Location: ../home.php");
