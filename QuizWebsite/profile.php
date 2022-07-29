<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="author" content="Francois Viviers">
    <link rel="icon" type="image/png" href="pictures/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body class="profile">
    <?php
    include 'php/header.php'
    ?>
    <!-- <div class="container-fluid" style="width: 95%;"> -->
    <div class="container">
        <br>
        <div class="profilec card">
            <div class="card-title">
                <h1 class="mt-3 mb-3 text-center">Profile Page</h1>
            </div>
            <div class="row card-body">
                <div class="col-4">
                    <img src="./pictures/nopic.png" class="img-fluid" alt="Responsive image">
                </div>
                <div class="col-6">
                    <div data-type="text" class="details">
                        <b>Username:</b> <span id="username"><?php echo $_COOKIE["username"]; ?></span> <button class="btn btn-dark pull-right">Edit</button>
                    </div>
                    <br>
                    <div data-type="email" class="details">
                        <b>Email:</b> <span id="email"><?php echo $_COOKIE["rEmail"]; ?></span> <button class="btn btn-dark pull-right">Edit</button>
                    </div>
                    <br>
                    <button class="btn btn-dark" id="update">Update</button>
                    <label class="label label-success" id="message"></label>
                </div>
            </div>
        </div>
        <h1>Your Quizes</h1>
				<?php
				$conn = OpenCon();
				?>
                <div class="row">
                    <div class="col-md-6">
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
                                                echo "<div class='row'><div class='col-4'><img src='./gallery/$imgName' class='col-12 img-thumbnail rounded mx-auto d-block'><img></div>";
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="./js/profile.js"></script>
    <!-- </div> -->
</body>

</html>