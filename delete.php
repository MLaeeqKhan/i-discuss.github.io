<?php
include '_dbConnect.php';
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

}

$id=$_GET['id'];
$q="DELETE from threads where thread_id='$id'";

$r="DELETE from replies where thread_id='$id'";
if($conn->query($q)==TRUE && $conn->query($r)==TRUE)
	echo header("location:yourQ.php");
else
	echo $conn->error;
$conn->close();
?>