<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <style>
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
    </style>
</head>
<body>
<?php
	include 'php/header.php'
?>
<form action="php/validate-signup.php" method="POST" id="form">
  <div id="character_dis2">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="fname"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="fname" id="name" required>

    <label for="fsurname"><b>Surname</b></label>
    <input type="text" placeholder="Enter Surname" name="fsurname" id="surname" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn" id="register">Register</button>
  </div>
</form>
<div id="footer">
		<p>Francois Viviers</p>
	</div>
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
        var sSurname = document.getElementById("surname").value;
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