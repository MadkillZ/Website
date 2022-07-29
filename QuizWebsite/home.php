<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
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
			<form class="col-md-12" action='./home.php' method='POST' enctype='multipart/form-data'>
				<input type="text" class="col-md-7 offset-md-1" id="input" name="search" />
					<select class="form-select" name="filter" aria-label="Default select example">
						<?php
							echo '<option value="ALL" selected>';
							echo 'ALL';
							echo '</option>';
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
				<button class="col-md-2" id="search">Search</button>
			</form>
			<div class="col-md-7" id="public">
				<br>
				<h1>Public Quizes</h1>
				<?php
				$conn = OpenCon();
				?>
				<?php
				$searchVal = isset($_POST["search"]) ? $_POST["search"] : null;
				$filter = isset($_POST["filter"]) ? $_POST["filter"] : null;
				if($filter=='ALL'){
					$filterVal = null;
				}
				else{
					$filterVal = $filter;	
				}
				if (isset($searchVal)) {
					if($filterVal!=null){
						$records = mysqli_query($conn, "SELECT * from tbquizzes where name like '%$searchVal%' AND category like '%$filterVal%'");
					}
					else{
						$records = mysqli_query($conn, "SELECT * from tbquizzes where name like '%$searchVal%'");
					}
				} else {
					if($filterVal!=null){
						$records = mysqli_query($conn, "SELECT * from tbquizzes where category like '%$filterVal%'");
					}
					else{
						$records = mysqli_query($conn, "SELECT * from tbquizzes");
					}
				}
				$count1 = 0;
				$array2[] = null;
				while ($data = mysqli_fetch_array($records)) {
					$array2[$count1] = $data;
				?>
					<a href="quizzes.php?superglobal=<?php echo $data['quiz_id'] ?>">
						<div class="card">
							<div class="card-body">
								<?php
								$quizID = $data['quiz_id'];
								$records2 = mysqli_query($conn, "select image_name from tbgallery WHERE quiz_id=$quizID");
								while ($data2 = mysqli_fetch_array($records2)) {
									$imgName = $data2['image_name'];
									echo "<div class='row'><div class='col-4'><img src='./gallery/$imgName' class='col-12 img-thumbnail rounded mx-auto d-block'><img></div>";
								}
								?>
								<?php echo "<div class='col-8 text-white'>" . $data['name'] . "</div></div>"; ?>
							</div>
							<br>
						</div>
						<br>
					</a>
				<?php $count1++;} ?>
				<?php CloseCon($conn); ?>
			</div>
			<div class="col-md-5" id="private">
				<br>
				<h1>Your Quizes</h1>
				<?php
				$conn = OpenCon();
				?>
				<?php
				// $cookiee1 = $_COOKIE["rEmail"];
				// $cookiee2 = $_COOKIE["rPassword"];
				// $query = "SELECT * FROM users WHERE email = '$cookiee1' AND password = '$cookiee2'";
				// $res = $conn->query($query);
				// if ($row = mysqli_fetch_array($res)) {
				// 	$ID = $row['user_id'];
				// }
				$records = mysqli_query($conn, "select * from tbquizzes WHERE user_id=$ID");
				$array1[] = null;
				$count = 0;
				while ($data = mysqli_fetch_array($records)) {
					$array1[$count] = $data;
					if ($count < 3) { ?>
						<a href="quizzes.php?superglobal=<?php echo $data['quiz_id'] ?>">
							<div class="card">
								<div class="card-body">
									<?php
									$quizID = $data['quiz_id'];
									$records2 = mysqli_query($conn, "select image_name from tbgallery WHERE quiz_id=$quizID");
									while ($data2 = mysqli_fetch_array($records2)) {
										$imgName = $data2['image_name'];
										echo "<div class='row'><div class='col-4'><img src='./gallery/$imgName' class='col-12  rounded mx-auto d-block'><img></div>";
									}
									?>
									<?php echo "<div class='col-8 text-white'>" . $data['name'] . "</div></div>"; ?>
								</div>
								<br>
							</div>
							<br>
						</a>
				<?php $count++;
					}
				$count++;} ?>
				<?php CloseCon($conn); ?>
			</div>
		</div>
	</div>
		
	<br>
	<!-- </div> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		var own = <?php echo json_encode($array1); ?>;
		var public = <?php echo json_encode($array2); ?>;
		//console.log(users);
		console.log(own);
		console.log(public);
	</script>
	<script type="text/javascript" src="./js/home.js"></script>
</body>
<!-- <?php
			include 'php/footer.php'
		?> -->

</html>