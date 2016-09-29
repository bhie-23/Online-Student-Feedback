<?php
		//error_reporting(0);
		
		//Connecting to DB
		$conn = new mysqli("localhost", "root", "");
	
		if ($conn->connect_error)
			die("Connection failed: " . $conn->connect_error);
		
		//Obtaining Values from Tables
		$sql = "SELECT * FROM student";
		$result = $conn->query($sql);
		
		session_start();
		
		$pass=$_POST['pass'];
		$user=$_POST['user'];

		$flag=0;

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if($_SESSION['user']=='admin')
			header('location:admin.php');
		while($row = $result->fetch_assoc())
			if(trim($_SESSION['user'])==trim($row['Roll_No']))
				$flag=1;
			
		if($flag==1)
			header('Location:student.php');
		
		
		function abc($user){
			//Connecting to DB
			$conn = new mysqli("localhost", "root", "");
	
			if ($conn->connect_error)
			die("Connection failed: " . $conn->connect_error);
		
			//Obtaining Values from Tables
			$sql = "SELECT Roll_No FROM student";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc())
				if($user==trim($row['Roll_No']))
					return 1;
			return 0;
		}
		
		function pwd($pass){
			//Connecting to DB
			$conn = new mysqli("localhost", "root", "pass");
	
			if ($conn->connect_error)
			die("Connection failed: " . $conn->connect_error);
		
			//Obtaining Values from Tables
			$sql = "SELECT Pass FROM student";
			$result = $conn->query($sql);
			while($row = $result->fetch_assoc()){
				if($pass==trim($row['Pass']))
					return 1;
			}
			return 0;
		}
		
		if(!empty($pass) && !empty($user)){
			if($user=='admin' && $pass=='admin'){
				header('Location: admin.php');
			}
			else if(abc($user)==1 && pwd($pass)==1){
				header('Location: student.php');
			}
		}

		if(empty($_SESSION['user']))
			$_SESSION['user']=$user;
		}
		
		//Saving Resource
		$conn->close();
	?>
<html>
	<title>Login Page</title>
	<!--<script type='text/javascript'>
	function validateForm(){
		var a=document.forms["Form"]["user"].value;
		var b=document.forms["Form"]["pass"].value;
		if (a==null || a=="",b==null || b==""){
			alert("Please Fill All Required Field");
		return false;
		}
    }
	</script>-->
	<body align=center style="background-color:grey;">
		<img src ="moodle.png" height=250 width=250/>
			<form action="login.php" method="post">
			<br><br><br><br><br><br>
			<table align=center border="0" width="30%">
				<tr>
					<td><b><h3>Username:<br></h3></b></td>
					<td>:</td>
					<td><input type=text id=uid name=user required><br></td>
				</tr>
				<tr>
					<td><b><h3>Password:<br></h3></b></td>
					<td>:</td>
					<td><input type=password name=pass required><br><br></td>
				</tr>
			</table><br><br>
			<button type=submit style="background-color:black; font-weight:bold; font-size:17px; color:white;">Login</button>
		</form>
	</body>
</html>