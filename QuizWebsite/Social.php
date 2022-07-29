<!DOCTYPE html>
<html>

<head>
	<title>Social</title>
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
				<h1>Users:</h1>
				<form class="col-md-12" action='./Manage_Users.php' method='POST' enctype='multipart/form-data'>
					<input type="text" class="col-md-7 offset-md-1" id="input" name="search" />
					<button class="col-md-2" id="search">Search</button>
				</form>
				<br>
                <div class="row">
                    <div class="col-md-8">
                        <h3>Registered Users:</h3>
                        <?php
                            $conn = OpenCon();
                            $searchVal = isset($_POST["search"]) ? $_POST["search"] : null;
                            if (isset($searchVal)) {
                                $records = mysqli_query($conn, "select username, email, user_id from users where username like '%$searchVal%'");
                            } else {
                                $records = mysqli_query($conn, "select username, email, user_id from users");
                            }
                            $array[] = null;
                            $count = 0;
                            echo '<ol>';
                            while ($data = mysqli_fetch_array($records)) {
                                
                                $array[$count] = $data;
                                echo '<a href="user.php?superglobal='. $data['user_id'] .'">';
                                    echo '<div class="card">'; //card
                                        echo '<div class="card-body text-white">'; //card body
                                            echo '<li>';
                                                echo $data['username'];
                                            echo '</li>';
                                        echo '</div>'; //card body
                                    echo '</div>'; //card
                                echo '</a>';
                                echo "<br>";	
                                $count++;
                                
                            }
                            echo '</ol>';
                        ?>
                    </div>
                    <div class="col-md-4">
                        <h3>Friends:</h3>
                        <div>
                            <?php
                                $records = mysqli_query($conn, "SELECT * FROM tbfriendreq WHERE user_2='$ID'");
                                while ($data = mysqli_fetch_array($records)) {
                                    $userID2 = $data['user_1'];
                                    echo '<div class="card">'; //card
                                        echo '<div class="card-body text-white">'; //card body
                                            //echo 'test';
                                            echo '<br>';
                                            echo '<button class="btn btn-success" id="AcceptFriend">Accept</button>';
                                        echo '</div>'; //card body
                                    echo '</div>'; //card
                                    $records1 = mysqli_query($conn, "SELECT * FROM tbfriendreq WHERE user_2='$userID2'");
                                    while ($res = mysqli_fetch_array($records1)) {
                                        //echo $res['name'];
                                    } 
                                }
                                
                                CloseCon($conn);
                            ?>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<!-- </div> -->
	<script type="text/javascript">
		var users = <?php echo json_encode($array); ?>;
		console.log(users);
	</script>
</body>
</html>