<!DOCTYPE html>
<?php 
	error_reporting(0);
	
	//Function for Dropdown menu
	function abc(){
		
		//Connecting PHP with DBMS and Obtaining Result of a querry
		$conn = new mysqli("localhost", "root", "pass","mp");

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
		<title>Feedback</title>
	</head>
	<body>
		<h1 style="background-color:#B0B0B0;"><center>Feedback</h1>
		<form action="subfed.php" method=POST>
			<center>
			<table border="0" width=40%>
				<tbody>
					<tr>
						<td><b>Subject</b></td>
						<td>:</td>
						<td><?php abc(); ?></td>
					</tr>	
				</tbody>
			</table>
			</center>
			<br><br><br>
			<center><input type="submit"/></center><br>
		</form>
	</body>
</html>

<?php 
	$sub=$_POST['SUB'];

	//Connecting to DB and obtaining values
	$conn = new mysqli("localhost", "root", "pass","mp");
	if ($conn->connect_error)
		die("Connection failed: " . $conn->connect_error);
	
	$sql = "SELECT * FROM Feedback where s_name='".$sub."'";
	$resul = $conn->query($sql);
	if ($resul->num_rows > 0){
		echo "<table align=center border=1px width=500>
				<tr align=center>
					<td>Roll_No</td>
					<td>Subject Name</td>
					<td>Feedback</td>
				</tr>";
		while($row = $resul->fetch_assoc())
			echo "<tr align=center>
					<td>" . $row["Roll_No"]. "</td>
					<td>" . $row["S_Name"]. "</td>
					<td>" . $row["Feedback"]. "</td>
				</tr>";
		echo "</table>";
	}
	else
		echo "<div align='center' style='font-size:20px'>No Feedback submitted.</div>";
	
	//Saving Resource
	$conn->close();
?>
<html>
	<body>
		<form>
			<center><br/><br/><br/><a href="logout.php"><input style="background-color:black; font-weight:bold; font-size:17px; color:white;" type=button value="Logout"></input></a></center>
		</form>
	</body>
</html>