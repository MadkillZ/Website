<!DOCTYPE html>
<html>

<head>
	<title>Quiz</title>
	<link rel="icon" type="image/png" href="pictures/favicon.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="container-fluid">
		<?php
		include 'php/header.php'
		?>
		<br>
		<div class="container">
			<?php
			$conn = OpenCon();
			$id = $_GET['superglobal'];
			$sql = "SELECT * FROM tbquizzes WHERE quiz_id=$id";
			$result = mysqli_query($conn, $sql);
			while ($row = $result->fetch_assoc()) {
				$userid = $row["user_id"];
				echo "<div class='card'>";
				echo "<h1 class='card-title text-center'>" . $row["name"] . "</h1>";
				echo "<div class='row'>";
				echo "<div class='card-body'>";
				echo "<p class='col-12 text-white text-center'>" . $row["description"] . "</p>";
				$sql2 = "SELECT * FROM tbgallery WHERE quiz_id=$id";
				$result2 = mysqli_query($conn, $sql2);
				while ($row2 = $result2->fetch_assoc()) {
					$image = $row2["image_name"];
					echo "<img src='./gallery/$image' class='col-12 rounded mx-auto d-block' style='width:200px;' ><img>";
				}
				if($userid==$ID || $isAdmin){
					echo '<div class="text-center color-white">' .
						'<button class="btn btn-dark"><a class="text-white" href="questions.php?superglobal=' . $id . '">Try now!</a></button><span>   </span>';
					//if ($id != $My_id) {
					echo
					'<button class="btn btn-dark" id="later"><a class="text-white" href="./php/addToList.php?superglobal=' . $id . '">Try later!</a></button><span>   </span>';
					echo
					'<button class="btn btn-dark" id="Edit"><a class="text-white" href="./EditQuiz.php?superglobal=' . $id . '">Edit</a></button>';
				//}
				}else{
					echo '<div class="text-center color-white">' .
						'<button class="btn btn-dark"><a class="text-white" href="questions.php?superglobal=' . $id . '">Try now!</a></button><span>   </span>';
					echo
					'<button class="btn btn-dark" id="later"><a class="text-white" href="./php/addToList.php?superglobal=' . $id . '">Try later!</a></button><span>   </span>';
				}
				echo "</div></div></div></div></div>";
			}

			CloseCon($conn);
			?>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>