<?php
include "db_connection.php";

$mysqli = OpenCon();

$userid = $_REQUEST['userid'];

    $sql = "SELECT quiz_id FROM tbquizzes WHERE user_id='$userid'";
	$res = $mysqli->query($sql);
	while ($row = mysqli_fetch_array($res)) {
        $IDQUIZ = $row['quiz_id'];
        $sql = "DELETE FROM tbquizzes WHERE quiz_id='$IDQUIZ'";
        if ($mysqli->query($sql) === TRUE) {
            echo "Quiz deleted successfully";
        } else {
            echo "Error deleting Quiz: " . $mysqli->error;
        }
        $sql = "DELETE FROM tbpersonal WHERE quiz_id='$IDQUIZ'";
        if ($mysqli->query($sql) === TRUE) {
            echo "Questions deleted successfully";
        } else {
            echo "Error deleting Questions: " . $mysqli->error;
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
    $sql = "DELETE FROM users WHERE user_id='$userid'";
    if ($mysqli->query($sql) === TRUE) {
        echo "Image deleted successfully";
    } else {
        echo "Error deleting Image: " . $mysqli->error;
    }

CloseCon($mysqli);

?>