<!DOCTYPE html>
<html>

<head>
	<title>Quiz List</title>
	<link rel="icon" type="image/png" href="pictures/favicon.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- <div class="container-fluid"> -->

	<?php
	include 'php/header.php'
	?>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>To Do:</h1>
				<?php
				$mysqli = OpenCon();
				$cookiee1 = $_COOKIE["rEmail"];
				$cookiee2 = $_COOKIE["rPassword"];
				$query = "SELECT * FROM users WHERE email = '$cookiee1' AND password = '$cookiee2'";
				$res = $mysqli->query($query);
				if ($row = mysqli_fetch_array($res)) {
					$ID = $row['user_id'];
				}
				$records = mysqli_query($mysqli, "select quiz_id from tbpersonal WHERE user_id='$ID'");
				while ($data = mysqli_fetch_array($records)) {
					$quizID = $data['quiz_id'];
					$rec = mysqli_query($mysqli, "select * from tbquizzes WHERE quiz_id=$quizID");
					while ($data2 = mysqli_fetch_array($rec)) { ?>
						<a href="quizzes.php?superglobal=<?php echo $data2['quiz_id'] ?>">
							<div class="card">
								<div class="card-title">
									<?php echo $data2['name']; ?>
								</div>
								<br>
							</div>
							<br>
						</a>
				<?php }
				}
				CloseCon($mysqli);
				?>
			</div>
		</div>
	</div>
	<!-- </div> -->
</body>

</html>