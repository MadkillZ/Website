<!DOCTYPE html>
<html>

<head>
	<title>Create Quiz</title>
	<link rel="icon" type="image/png" href="pictures/favicon.png">
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<meta charset="utf-8" />
	<meta name="author" content="Francois Viviers">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<!-- Francois Viviers -->
</head>

<body>
	<?php
	include 'php/header.php';
	?>
	<div class="container">
		<br>
		<form action='./php/CreatingQuiz.php' method='POST' enctype='multipart/form-data'>
			<div class="row">
				<h1 class="">Create Quiz</h1>
				<div class='form-group card-body col-12'>
					<input type='file' class='form-control' name='picToUpload[]' id='picToUpload' multiple='multiple' require /><br />
					<label for='quizName'>Quiz Name:</label><br>
					<input type='text' class='form-control' name='quizName' require /><br>
					<label for='quizDescription'>Quiz Description:</label><br>
					<input type='text' class='form-control' name='quizDescription' maxlength="80" require/><br>
					<label for='quizCat'>Quiz Category:</label><br>
					<select class="form-select" aria-label="Default select example" name="category">
                        <?php
                        	$mysqli = OpenCon();
                            $records = mysqli_query($mysqli, "SELECT * FROM categories");
                            while ($data = mysqli_fetch_array($records)) {
								$CatName = $data['name'];
								echo '<option value="'. $CatName .'">';
								echo $CatName;
								echo '</option>';
                            }
							CloseCon($mysqli);
                        ?>
                    </select>
				</div>
			</div>
			<div class="questions">
			</div>
			<input type='submit' class='btn-standard' value='Upload Quiz' name='submit' id="sub" />
		</form>
		<br>
		<button id="add">Add Question</button>

	</div>
	<!-- <div>
		<?php
		include 'php/footer.php'
		?>
	</div> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript" src="./js/addQuestions.js"></script>
</body>

</html>