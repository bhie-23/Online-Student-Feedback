<?php 
	session_start();
	if($_SESSION['user']!='admin')
		header('location:login.php');
?>
<!DOCTYPE html>
	<title>Admin Page.</title>
	<style>
		img{
			width:100px;
		}
		p{
	
			text-shadow:8px 8px 8px #505050;
			letter-spacing:5px;word-spacing:2px;color:#480000;
		}
	</style>
	<body align=center>
		<h1 style="background-color:#B0B0B0;">Welcome Admin!</h1>
		<form action=admin.php method=post>
			<p>Add  Subject</p>
			<a href='addsub.php'><img src="add.png"></a><br><br>
			<p>Add  Student</p>
			<a href='addstudent.php'><img src="add.png"></a><br><br>
			<p>Get Feedback</p>
			<a href='feedback.php'><img src="feedback.png"></input></a><br><br>
			<center><br/><br/><br/><button style="background-color:black; font-weight:bold; font-size:17px;"><b><a style="text-decoration:none; color:white;" href="logout.php">Logout</a></b></button></center>
		</form>
	</body>
</html>