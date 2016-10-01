<!DOCTYPE html>
<?php
	error_reporting(0);
	
	//Values from the Form
	$roll=$_POST['rollno'];
	$name=$_POST['name'];
	$pass=$_POST['password'];
	
	//Connection to DB
	$conn = new mysqli("localhost", "root", "pass");
	
	if ($conn->connect_error)
		die("Connection failed: " . $conn->connect_error);
	
	//Inserting values into Student Table
	if($roll!='' || $name!='' || $pass!=''){
		$sql="INSERT INTO Student VALUES ($roll, '$name', $pass)";
		
		if ($conn->query($sql) === TRUE)
			echo "<script> alert('Student Added!'); </script>";
		else
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	//Saving resources
	$conn->close();
?>
<html>
	<head>
		<title>Add Student</title>
	</head>
		<h1 style="background-color: #B0B0B0;">Add Student</h1>
		<body align=center>
		<form method=post>
			<center><br><br><br><table border="0" width="30%" >
		
			<tr>
			<td><b><h3>Enter Roll No </h3></b></td>
			<td>:</td><td><input type="text" name="rollno" size="10"></td>
			</tr>
			
		
			<tr>
			<td><b><h3>Enter Name</h3></b></td>
			<td>:</td><td><input type="text" name="name" size="10"></td>
			</tr>
	
			
			<tr>
			<td><b><h3>Enter Password</h3></b></td>
			<td>:</td><td><input type="password" name="password" size="10"></td>
			</tr>
		     
		  </table>
		<br><br>
		
		<center><input type=submit  value=submit>
		
			<center><br/><br/><br/><a href="logout.php"><input style="background-color:black; font-weight:bold; font-size:17px; color:white;" type=button value="Logout"></input></a></center>

</form>
	
	</body>
</html>
