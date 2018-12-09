<?php
session_start();

$conn = mysqli_connect("localhost","root","","gallery");

?>

<!DOCTYPE html>
<html>
<head>
	<title>	
		Image Gallery
	</title>
</head>
<body>
		<form method="post" action="upload_image.php" enctype="multipart/form-data">
			<label for="image">Select Image to Upload</label>
			<input type="file" name="image" id="image"/>
			<label for"name">Enter Descriptive Name</label>
			<input type="text" name="name"  id="name"/>
			<button type="submit">Upload</button>
		</form>
		<h1>Your Images</h1>
		<?php
			$sql = "select * from images;";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)){
				echo "<img src='images/".$row['image']."' height='200px' width='200px'>";
			}
		?>
</body>
</html>