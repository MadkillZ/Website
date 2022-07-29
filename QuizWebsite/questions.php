<!DOCTYPE html>
<html>

<head>
	<title>Quiz</title>
	<link rel="icon" type="image/png" href="pictures/favicon.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body class="questions">
	<div class="container-fluid">
		<?php
		include 'php/header.php'
		?>
		<br>
		<div class="container">
			<?php
			$conn = OpenCon();
			$id = $_GET['superglobal'];
			//echo $id;
			$sql = "SELECT * FROM tbquizzes WHERE quiz_id=$id";
			$result = mysqli_query($conn, $sql);
			while ($row = $result->fetch_assoc()) {
				echo "<div class='card'>";
				echo "<h1 class='card-title text-center'>" . $row["name"] . "</h1>";
				echo "<div class='row'>";
				echo "<div class='card-body'>";
				echo "<p class='col-12 text-white text-center'>" . $row["description"] . "</p>";
				$sql2 = "SELECT * FROM tbgallery WHERE quiz_id=$id";
				$result2 = mysqli_query($conn, $sql2);
				while ($row2 = $result2->fetch_assoc()) {
					$image = $row2["image_name"];
					echo "<img src='gallery/$image' class='col-12 rounded mx-auto d-block' style='width:200px;' ><img>";
				}
				//Importing questions
				$sql3 = "SELECT question_id,question FROM tbquestions WHERE quiz_id='$id'";
				$res = mysqli_query($conn, $sql3);
				echo '<div class="form-check"><form id="myForm">';
				$count = 1;
				echo '<div class="text-center text-white">';
				while ($row3 = $res->fetch_assoc()) {
					$questionID = $row3['question_id'];
					$quest = $row3['question'];
					echo '<h4>' . $quest . '</h4>';
					//Answers Part
					$sql4 = "SELECT isCorrect,answer FROM tbanswers WHERE question_id='$questionID'";
					$res2 = mysqli_query($conn, $sql4);
					echo '<div><form>';
					$count2 = 1;
					echo '<div class="text-center text-align">';
					while ($row4 = $res2->fetch_assoc()) {
						$isCorrect = $row4['isCorrect'];
						$ans = $row4['answer'];
						if ($isCorrect) {
							$rAns = $ans;
						}
						echo '<input class="form-check-input" type="radio" id="Question' . $count . 'Ans' . $count2 . '" name="Question' . $count . '" value="' . $ans . '">'; //Question1Ans1
						echo '<label class="form-check-label" for="Question' . $count . 'Ans' . $count2 . '">' . $ans . '</label><br>';
						$count2++;
					}
					echo '<input type="hidden" id="Question' . $count . 'RAns" name="Question' . $count . 'RAns" value="' . $rAns . '">'; //Question1RAns
					$count++;
					echo '</div>';
				}
				echo '<input type="hidden" id="nrQ" value="' . $count . '"></input>';
				echo "</div></form></div></div></div><div class='text-center' id='ResultAns'><button id='results'>Results</button></div></div>";
			}

			CloseCon($conn);
			?>

		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="./js/answers.js"></script>
</body>

</html>