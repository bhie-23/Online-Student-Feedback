<?php
	session_start();
	error_reporting(0);
	$flag=0;
	//Connecting to DB
	$conn = new mysqli("localhost", "root", "pass");
	
	if ($conn->connect_error)
	die("Connection failed: " . $conn->connect_error);
		
	//Obtaining Values into Tables
	$sql = "SELECT Roll_No FROM student";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc())
		if($_SESSION['user']==trim($row['Roll_No']))
			$flag=1;
		
	if($flag==1);
	else
		header('location:login.php');
	//Saving Resource
	$conn->close();
	
	//Function for Dropdown box
	function abc(){
		//Connecting PHP with DBMS and Obtaining Result of a querry
		$conn = new mysqli("localhost", "root", "pass");

		if ($conn->connect_error)
			die("Connection failed: " . $conn->connect_error);
	
		$sql = "SELECT S_Name FROM Subject";
		$result = $conn->query($sql);
		
		//Inserting values in dropdown
		echo "<select name='SUB'>";
		if ($result->num_rows > 0)
			while ($row = $result->fetch_assoc())
				echo "<option value='" . $row['S_Name'] . "'>" . $row['S_Name'] . "</option>";
		else
			echo "0 results";
		echo "</select>";
		
		//Saving Resource
		$conn->close();
	}
?>
<html>
	<head>
		<title>Student</title>
	</head>
		<style>
		body{
			background-color:gray
		}
		a{
			text-decoration:none;
		}
	</style>
	<body>
	<form name ="myForm" action="student.php" method="post" onsubmit ="return validateForm()" enctype="multipart/form-data">
			<table border="0" width="100%" col="2">
				<tbody>
				<tr>
					<td><b>Subject</b></td>
					<td>:</td>
					<td><?php abc(); ?></td>
				</tr>	
				<tr>
					<td><b>Feedback</b></td>
					<td>:</td><td><textarea name="Feedback" rows="10" cols="50"></textarea>
					</td>
				</tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td></td>
					<td></td>
					<td>
						<input style="background-color:6699FF; font-size:16px; font-weight:bold; color:white;" type="submit" name="submit" value="submit" /><input style="background-color:6699FF; font-size:15px; color:black;" type="reset" name="reset" value="reset" />
					</td>
				</tr>	
			</tbody>
		</table>
	<center><br/><br/><br/><a href="logout.php"><input style="background-color:black; font-weight:bold; font-size:17px; color:white;" type=button value="Logout"></input></a></center>
	</form>
	<script>
		function validateForm(){
			var x = document.forms["myForm"]["Feedback"].value;
			if(x==null||x=="") {
				alert("Name is empty.");
				return false;
			}
		}
<?php
	//Obtaining values from Form
	$sub=$_POST['SUB'];
	$username=$_SESSION['user'];
	$fb=$_POST['Feedback'];
	
	//Connecting to DB
	$conn = new mysqli("localhost", "root", "pass");
	
	if ($conn->connect_error)
		die("Connection failed: " . $conn->connect_error);

	//Inserting values to Subject Table
	if($sub=="" || $username=="" || $fb=="")
		echo "<script> alert('A field is left empty!'); </script>";
	else{
		$sql="INSERT INTO Feedback VALUES ($username,'$sub','$fb')";
		if ($conn->query($sql) === TRUE)
			echo "<script> alert('Feedback Added!'); </script>";
		else
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	//Saving Resource
	$conn->close();
?>
		</script>
	</body>
</html>