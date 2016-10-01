<!DOCTYPE html>
<?php

	error_reporting(0);
	//Obtaining values from Form
	$sub=$_POST['subject'];
	
	//Connecting to DB
	$conn = new mysqli("localhost", "root", "pass","mp");
	
	if ($conn->connect_error)
		die("Connection failed: " . $conn->connect_error);
	
	//Inserting values to Subject Table
	if($sub=="")
		echo "<script> alert('Enter a subject.'); </script>";
	else{
		$sql="INSERT INTO Subject VALUES ('$sub')";
		if ($conn->query($sql) === TRUE)
			echo "<script> alert('Subject Added!'); </script>";
		else
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	//Saving Resource
	$conn->close();
	
	//Function for Dropdown menu
	function abc(){
		
		//Connecting PHP with DBMS and Obtaining Result of a querry
		$conn = new mysqli("localhost", "root", "pass","mp");

		if ($conn->connect_error)
			die("Connection failed: " . $conn->connect_error);
	
		$sql = "SELECT S_Name FROM Subject";
		$result = $conn->query($sql);
		
		//Inserting values in dropdown
		if ($result->num_rows > 0)
			while ($row = $result->fetch_assoc()){
				echo $row['S_Name'];
				echo "\n";
			}	
		else
			echo "No Subjects added";
		
		//Saving Resource
		$conn->close();
	}
?>
<html>
	<head>
		<script>
		</script>
		<title>Subject Add</title>
	</head>
	<body align=center>
		<h1 style="background-color:#B0B0B0;">Add Subjects</h1><br><br><br>
		<form action="addsub.php" method="POST">
			Please enter the Subject to be added:
			<br><br>
			<input type=text name=subject>
			<input type=submit value=Add>
			<br><br>
			<textarea name=allsub rows=10 cols=30><?php abc() ?></textarea>
			<br><br>
			<input type=button onClick=window.location.reload() value=Refresh>
			<center><br/><br/><br/><a href="logout.php"><input style="background-color:black; font-weight:bold; font-size:17px; color:white;" type=button value="Logout"></input></a></center>
		</form>
	</body>
</html>
