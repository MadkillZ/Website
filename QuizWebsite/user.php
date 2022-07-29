<!DOCTYPE html>
<html lang="en">

<head>
    <title>User Profile</title>
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
        <?php 
            $conn = OpenCon();
            $userID = $_GET['superglobal'];
            $records = mysqli_query($conn, "select * from users where user_id='$userID'");
            while ($data = mysqli_fetch_array($records)) {
                $username = $data['username'];
                $email = $data['email'];
            }
            CloseCon($conn);
        ?>
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
                        <b>Username:</b> <span id="username"><?php echo $username; ?></span> <?php if($isAdmin){echo '<button class="btn btn-dark pull-right">Edit</button>';}?>
                    </div>
                    <br>
                    <div data-type="email" class="details">
                        <b>Email:</b> <span id="email"><?php echo $email; ?></span>  <?php if($isAdmin){echo '<button class="btn btn-dark pull-right">Edit</button>';}?>
                    </div>
                    <br>
                    <?php
                        if($isAdmin){
                           echo '<button class="btn btn-dark" id="AdminUpdate">Update</button>
                           <button class="btn btn-dark" id="AdminDelete">Delete</button>
                           <button class="btn btn-dark" id="addfriend">Add friend</button>
                           <label class="label label-success" id="message"></label>'; 
                        }
                        else{
                            echo '<button class="btn btn-dark" id="addfriend">Add friend</button>';
                        }
                    ?>
                    <!-- <button class="btn btn-dark" id="AdminUpdate">Update</button>
                    <button class="btn btn-dark" id="AdminDelete">Delete</button>
                    <label class="label label-success" id="message"></label> -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        var prevUsername = '<?php echo $username; ?>';
        var prevEmail = '<?php echo $email; ?>';
        var userID = '<?php echo $userID; ?>';
        var yourID = '<?php echo $ID; ?>';
    </script>
     <?php
        if($isAdmin){
            echo '<script type="text/javascript" src="./js/users.js"></script>'; 
        }
    ?>
    <script type="text/javascript" src="./js/addFriend.js"></script>
    <!-- </div> -->
    <?php
    include 'php/footer.php'
    ?>
</body>

</html>