<!DOCTYPE html>
<?php
?>
<html>
	<head>
		<title>Complete Feedback</title>
	</head>
	<body>
		<h1 style="background-color:#B0B0B0; "><center>Complete Feedback</h1>
		<br><br><br>
	</body>
</html>
<?php
		//Connecting to DB
		$conn = new mysqli("localhost", "root", "pass","mp");
	
		if ($conn->connect_error)
			die("Connection failed: " . $conn->connect_error);
		
		//Obtaining Values from Tables
		$sql = "SELECT * FROM Feedback";
		$result = $conn->query($sql);

		if ($result->num_rows > 0){
			echo "<table align=center border=1px width=500>
				<tr align=center>
					<td>Roll_No</td>
					<td>Subject Name</td>
					<td>Feedback</td>
				</tr>";
			while($row = $result->fetch_assoc())
				echo "<tr align=center>
					<td>" . $row["Roll_No"]. "</td>
					<td>" . $row["S_Name"]. "</td>
					<td>" . $row["Feedback"]. "</td>
				</tr>";
			echo "</table>";
		}
		else
			echo "0 results";
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