<?php
session_start();
$conn = mysqli_connect("localhost","root","","pract");
if(isset($_POST['id']))
	echo "ID is set";

if(isset($_POST['upload']) && isset($_POST['name']) && isset($_POST['branch'])){
$id = $_POST['ID'];
$name = $_POST['name'];
$branch = $_POST['branch'];

$sql = "insert into student values('$id','$name','$branch')";
$result = mysqli_query($conn,$sql);
unset($_POST['id']);
unset($_POST['name']);
unset($_POST['branch']);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Data</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<h1> Signup</h1>

	<form method = "post" action="student.php" enctype="multipart/form-data">
		<lable for="ID">Student ID:</lable>
		<input type="text" name="ID" id="ID" required="true"/><br><br>
		<lable for="name">Student Name:</lable>
		<input type="text" name="name" id="name" required="true"/><br><br>
		<lable for="branch">Student Branch:</lable>
		<input type="text" name="branch" id="branch" required="true"/><br><br>
		<button type="Submit" name="upload">Upload</button>
	</form>
	<h1> JSON data </h1>
		<?php
			$query = "Select * from student";
			$result = mysqli_query($conn,$query);
			$json_array = array();

			while($row = mysqli_fetch_assoc($result)){
				$json_array[] = $row;
			}
			echo json_encode($json_array);

		?>
</html>