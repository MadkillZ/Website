<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Login Page </title>  
<style>    
button {   
       background-color: #4CAF50;   
       width: 100%;  
        color: orange;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
 form {   
        border: 3px solid #f1f1f1;   
    }   
 input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }            
</style>   
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>    
<body> 
<?php
	include 'php/header.php'
?>   
    <center> <h1> Login Form </h1> </center>   
    <form action="php/validate-login.php" method="POST" id="form">  
        <div id="character_dis2">   
            <label>Email: </label>   
            <input type="text" placeholder="email" name="username" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <button type="submit">Login</button>   
            <input type="checkbox" checked="checked"> Remember me
            <button type="button" class="cancelbtn" onclick="location.href='signup.php'"> Register</button>   
            <button type="button" class="cancelbtn"> Cancel</button>   
            Forgot <a href="#"> password? </a>   
        </div>   
    </form>  
    <div id="footer">
		<p>Francois Viviers</p>
	</div>
    <script src="js/main.js"></script>   
</body>     
</html>  