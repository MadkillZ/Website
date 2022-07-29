<?php 
include 'db_connection.php';
$cookiee1 = $_COOKIE["rEmail"];
$cookiee2 = $_COOKIE["rPassword"];
$conn = OpenCon();
$query = "SELECT * FROM users WHERE email = '$cookiee1' AND password = '$cookiee2'";
$res = $conn->query($query);
if ($row = mysqli_fetch_array($res)) {
	$ID = $row['user_id'];
}

$query = "SELECT is_admin FROM users WHERE user_id='$ID'";
$res = $conn->query($query);
if ($row = mysqli_fetch_array($res)) {
	$isAdmin = $row['is_admin'];
}



if(!isset($_COOKIE["username"])) {
	echo '<h1><a href="index.php"><img src="pictures/logo.png" class="rounded mx-auto d-block" alt="logo"></a></h1>';
  } else if($isAdmin){
	echo '
	<h1><a href="home.php"><img src="pictures/logo.png" class="rounded mx-auto d-block" alt="logo"></a></h1>
	<br>
	<nav class="navbar navbar-expand-lg navbar-custom">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<ul class="navbar-nav mr-auto">
			<li id="login" class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
			<li id="login" class="nav-item"><a class="nav-link" href="newquiz.php">Create Quiz</a></li>
			<li id="login" class="nav-item"><a class="nav-link" href="QuizList.php">Quiz List</a></li>
			<li id="login" class="nav-item"><a class="nav-link" href="Social.php">Social</a></li>	
			<li id="login" class="nav-item"><a class="nav-link" href="Categories.php">Categories</a></li>	
			<li id="login" class="nav-item"><a class="nav-link" href="Manage_Users.php">Manage Users</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li id="login" class="nav-item"><a href="profile.php" class="nav-link">Hello '.$_COOKIE["username"].'</a></li>
			<li id="login" class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>
		</ul>	
	</div>
	</nav>';
  }
  else{
	echo '
	<h1><a href="home.php"><img src="pictures/logo.png" class="rounded mx-auto d-block" alt="logo"></a></h1>
	<br>
	<nav class="navbar navbar-expand-lg navbar-custom">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<ul class="navbar-nav mr-auto">
			<li id="login" class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
			<li id="login" class="nav-item"><a class="nav-link" href="newquiz.php">Create Quiz</a></li>
			<li id="login" class="nav-item"><a class="nav-link" href="QuizList.php">Quiz List</a></li>
			<li id="login" class="nav-item"><a class="nav-link" href="Social.php">Social</a></li>	
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li id="login" class="nav-item"><a href="profile.php" class="nav-link">Hello '.$_COOKIE["username"].'</a></li>
			<li id="login" class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>
		</ul>	
	</div>
	</nav>';
  }
  CloseCon($conn);
?>

<!-- <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
<li class="nav-item"><a class="nav-link" href="new.php">New Releases</a></li>
<li class="nav-item"><a class="nav-link" href="top_rated.php">Top Rated</a></li>
<li class="nav-item"><a class="nav-link" href="featured.php">Featured</a></li>
<li class="nav-item"><a class="nav-link" href="calendar.php">Calendar</a></li> -->
<!-- <li id="login">Hello '.$_COOKIE["username"].'<br><a href="php/logout.php">Logout</a></li> -->

