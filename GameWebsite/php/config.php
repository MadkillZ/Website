<?php
	function OpenCon()
		 {
			$dbhost = "localhost";
			$dbuser = "u18055461";
			$dbpass = "QJXKGMGYLIAZOAH4Y2WROYK3LDCGW5PC";
			//$db = "Users";
			$conn = new mysqli($dbhost, $dbuser, $dbpass);;
			if($conn->connect_error)
				die("Connection failure: " . $conn->connect_error);
			else{
				$conn->select_db("u18055461");
				echo "Connection sucess";
				return $conn;
			}	
		 }
		 
		function CloseCon($conn){
			$conn -> close();
		}
	   
?>