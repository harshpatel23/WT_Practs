<?php
session_start();
$image = $_FILES['image']['name'];

$target = "images/".basename($image);
$conn = mysqli_connect("localhost","root","","gallery");

$name = $_POST['name'];

$sql = "insert into images (image,name) values ('$image','$name');";
$result = mysqli_query($conn,$sql);

if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
$msg = "Success";
else
$msg = "Failed";

header("refresh:0; url=image_gallery.php")
?>