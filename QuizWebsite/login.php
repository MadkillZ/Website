<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" 
      type="image/png" 
      href="pictures/favicon.png">  
<title> Login Page </title>    
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>    
<body class="login"> 
    <?php
        include 'php/header.php'
    ?>
    <br>   
        <div class="container-fluid" style="width: 90%;">
            <div class="row">
                <div class="col-3"><img class="img-fluid img-thumbnail" src=""></img></div>
                <div class="card col-6">
                    <br>
                    <div class="form-group">
                    <h1 class="card-title text-center text-white"> Login Form </h1> 
                        <form action="php/validate-login.php" method="POST" id="form" class="card-body">  
                                <div id="character_dis2" class="row">   
                                    <div class="col-md-12 box text-white"><label>Email: </label></div>   
                                    <div class="col-md-12 box"><input type="text" class="form-control" placeholder="email" name="username" required></div>  
                                    <div class="col-md-12 box text-white"><label>Password : </label></div>   
                                    <div class="col-md-12 box"><input type="password" class="form-control" placeholder="Enter Password" name="password" required></div>
                                    <div class="col-md-12 box">
                                        <button type="submit">Login</button>  
                                        <button type="button" class="cancelbtn" onclick="location.href='signup.php'"> Register</button>
                                    </div>       
                            </div>  
                        </form>
                    </div> 
                </div>
            </div>  
            
        </div>
        <?php
			include 'php/footer.php'
		?>
    <script src="js/main.js"></script>   
</body>     
</html>  