<?php
include "db_connection.php";
$cookiee1 = $_COOKIE["rEmail"];
$cookiee2 = $_COOKIE["rPassword"];
$mysqli = OpenCon();
//delete Quiz


$query = "SELECT * FROM users WHERE email = '$cookiee1' AND password = '$cookiee2'";
$res = $mysqli->query($query);
if ($row = mysqli_fetch_array($res)) {
	$userID = $row['user_id'];
}

// See all errors and warnings
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

$rName = isset($_POST["quizName"]) ? $_POST["quizName"] : null;
$email = $cookiee1;
$pass = $cookiee2 = $_COOKIE["rPassword"];
// If email and/or pass POST values are set, set the variables to those values, otherwise make them false
$id = $userID;
$description = isset($_POST["quizDescription"]) ? $_POST["quizDescription"] : null;
$category = isset($_POST["category"]) ? $_POST["category"] : null;
echo $description . '<br>';
$img = isset($_FILES['picToUpload']) ? $_FILES['picToUpload']['name'][0] : null;
echo $img . '<br>';
//If new quiz is being uploaded
if ($description != null && $img != null && $rName != null) {
	//echo "UserID: " . $id."<br>";
	$target_dir = "../gallery/";
	$target_file = $target_dir . basename($_FILES["picToUpload"]["name"][0]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	//Check if image file is a actual image or fake image
	if (
		$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif"
	) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["picToUpload"]["tmp_name"][0], $target_file)) {
			echo "The file " . htmlspecialchars(basename($_FILES["picToUpload"]["name"][0])) . " has been uploaded.";
		}
		$sql = "INSERT INTO tbquizzes (user_id, description, category, name)
			VALUES ('$id', '$description', '$category','$rName')";
		if (mysqli_query($mysqli, $sql)) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
		}
		//inserting into tbgallery
		$sql = "SELECT quiz_id FROM tbquizzes WHERE user_id='$id' AND description='$description'";
		$res = $mysqli->query($sql);
		if ($row = mysqli_fetch_array($res)) {
			$quizID = $row['quiz_id'];
			echo "Quiz_ID: " . $quizID . "<br>";
			$sql = "INSERT INTO tbgallery (quiz_id, image_name)
			VALUES ('$quizID', '$img')";
			if (mysqli_query($mysqli, $sql)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
			}
		}
		//   } else {
		//     //echo "Sorry, there was an error uploading your file.";
		//   }
	}

	//inserting into tbquizzes

}

//Doing the questions part!
$count = 1;
while (isset($_POST["question" . $count . ""])) {
	$Question = $_POST["question" . $count . ""];
	$nrAns = $_POST["question" . $count . "NrAns"];
	$rAns =  $_POST["question" . $count . "RA"];
	echo $Question . "<br>";
	echo $rAns . "<br>";
	//inserting questions
	$sql = "INSERT INTO tbquestions (quiz_id,question)
		VALUES ('$quizID','$Question')";
	if (mysqli_query($mysqli, $sql)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
	}
	//Getting question_id
	$sql = "SELECT question_id FROM tbquestions WHERE quiz_id='$quizID' AND question='$Question'";
	$res = $mysqli->query($sql);
	if ($row = mysqli_fetch_array($res)) {
		$questionID = $row['question_id'];
	}
	//inserting answers
	for ($i = 1; $i <= $nrAns; $i++) {
		$Ans = $_POST["question" . $count . "Answer" . $i . ""];
		if ($i != $rAns) {
			$sql = "INSERT INTO tbanswers (question_id,isCorrect,answer)
				VALUES ('$questionID','0','$Ans')";
			if (mysqli_query($mysqli, $sql)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
			}
		} else {
			$sql = "INSERT INTO tbanswers (question_id,isCorrect,answer)
				VALUES ('$questionID','1','$Ans')";
			if (mysqli_query($mysqli, $sql)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
			}
		}
		echo $Ans . "<br>";
	}
	echo "<br>";
	$count++;
}

if (isset($_POST["DeleteQuiz"])) {
	$IDQUIZ = $_POST["DeleteQuiz"];
	$sql = "DELETE FROM tbquizzes WHERE quiz_id='$IDQUIZ'";
	if ($mysqli->query($sql) === TRUE) {
		echo "Quiz deleted successfully";
	} else {
		echo "Error deleting Quiz: " . $mysqli->error;
	}
	$sql = "DELETE FROM tbgallery WHERE quiz_id='$IDQUIZ'";
	if ($mysqli->query($sql) === TRUE) {
		echo "Image deleted successfully";
	} else {
		echo "Error deleting Image: " . $mysqli->error;
	}

	$query = "SELECT question_id FROM tbquestions WHERE quiz_id='$IDQUIZ'";
	$res = $mysqli->query($query);
	while ($row = mysqli_fetch_array($res)) {
		$QuestionID = $row['question_id'];
		$sql = "DELETE FROM tbanswers WHERE question_id='$QuestionID'";
		if ($mysqli->query($sql) === TRUE) {
			echo "Answers deleted successfully";
		} else {
			echo "Error deleting Answers: " . $mysqli->error;
		}
	}
	$sql = "DELETE FROM tbquestions WHERE quiz_id='$IDQUIZ'";
	if ($mysqli->query($sql) === TRUE) {
		echo "Questions deleted successfully";
	} else {
		echo "Error deleting Questions: " . $mysqli->error;
	}
}
CloseCon($mysqli);
header("Location: ../home.php");
