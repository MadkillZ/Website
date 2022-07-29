<?php 
include 'config.php';
if(!isset($_COOKIE["username"])) {
	echo '<div id="header">
		<h1><a href="index.html"><img src="pictures/logo.png" alt="logo"></a></h1>
		<br>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="new.php">New Releases</a></li>
				<li><a href="top_rated.php">Top Rated</a></li>
				<li><a href="featured.php">Featured</a></li>
				<li><a href="calendar.php">Calendar</a></li>
                <li id="login"><a href="login.php">Sign-Up/Login</a></li>
			</ul>
		</nav>
	</div>';
  } else{
	echo '<div id="header">
		<h1><a href="index.html"><img src="pictures/logo.png" alt="logo"></a></h1>
		<br>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="new.php">New Releases</a></li>
				<li><a href="top_rated.php">Top Rated</a></li>
				<li><a href="featured.php">Featured</a></li>
				<li><a href="calendar.php">Calendar</a></li>
				<li><a href="preferences.php">Preferences</a></li>
                <li id="login">Hello '.$_COOKIE["username"].'<br><a href="php/logout.php">Logout</a></li>
			</ul>
		</nav>
	</div>';
  }
?>