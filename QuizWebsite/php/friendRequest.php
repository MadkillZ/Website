<?php
    include "db_connection.php";
    $user1 = $_REQUEST['user_1'];
    $user2 = $_REQUEST['user_2'];
    $mysqli = OpenCon();
    $sql = "INSERT INTO tbfriendreq (user_1, user_2)
		VALUES ('$user1', '$user2')";
	if (mysqli_query($mysqli, $sql)) {
		echo "Friend Request Send";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
	}

    CloseCon($mysqli);
?>