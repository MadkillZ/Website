<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
  <link rel="icon" 
      type="image/png" 
      href="pictures/favicon.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>
</head>
<body>
<?php
	include 'php/header.php'
?>
<div class="container-fluid" style="width: 90%;">
<br>
<div class="row">
  <div class="col-12 card">
    <form action="php/validate-signup.php" method="POST" id="form" class="form-group">
      
        <h1 class="card-title text-center">Register</h1>
        <div class="row">
        <div class="card-body">
            <div class="col-md-12"><p>Please fill in this form to create an account.</p></div>
            <hr>
            <div class="col-md-12"><label for="fname"><b>Username</b></label></div>
            <div class="col-md-12"><input type="text" placeholder="Enter Name" name="fname" id="name" required></div>

            <div class="col-md-12"><label for="email"><b>Email</b></label></div>
            <div class="col-md-12"><input type="text" placeholder="Enter Email" name="email" id="email" required></div>

            <div class="col-md-12"><label for="psw"><b>Password</b></label></div>
            <div class="col-md-12"><input type="password" placeholder="Enter Password" name="psw" id="psw" required></div>
            <hr>

            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <button type="submit" class="registerbtn" id="register">Register</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<!-- <?php
			include 'php/footer.php'
	?> -->
</body>
<script src="js/main.js"></script>
<script type="text/javascript">
var form = document.getElementById('form');
    form.addEventListener('submit', (e) =>{
      if(myScript()==false)
        e.preventDefault();
        
    });
    function myScript(){
        var sName = document.getElementById("name").value;
        var sEmail = document.getElementById("email").value;
        var sPassword = document.getElementById("psw").value;
        var register = document.getElementById("register");
        //alert(sEmail);
        if(validateEmail(sEmail)==false){
            alert("Email is not valid");
            return false;;
        }
        if(validatePassword(sPassword)==false){
            alert("Password is not valid");
            return false;
        }     
    }
    function validateEmail(email){
        var regex =  /^[A-Za-z0-9._%+-]{1,64}@(?:[A-Za-z0-9-]{1,63}\.){1,125}[A-Za-z]{2,63}/;
        return regex.test(email);
    }
    function validatePassword(pass){
        //alert("Test");
        if (pass.length<8)
            return false;
        var regexN = /((\w)*([A-Z])+(\w)*(\W)+(\w)*([0-9])+)|((\w)*(\W)+(\w)*([0-9])(\w)*([A-Z])+)|((\w)*([0-9])+(\w)*([A-Z])+(\w)*(\W)+)|((\w)*([A-Z])+(\w)*([0-9])+(\w)*(\W)+)|((\w)*([0-9])+(\w)*(\W)+(\w)*([A-Z])+)|((\w)*(\W)+(\w)*([A-Z])+(\w)*([0-9])+)/;   
        return regexN.test(pass);
    }
</script>
</html>