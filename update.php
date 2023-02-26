<?php
include '_dbConnect.php';

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

}

$title= $_POST["thread_title"];
$desc= $_POST["thread_desc"];
$id=$_POST['id'];

$title=str_replace("<","&lt"," $title");
$title=str_replace(">","&gt","$title");
$title=str_replace("'","&ct","$title");

$desc=str_replace("<","&lt", "$desc");
$desc=str_replace(">","&gt", "$desc");
$desc=str_replace("'","&ct", "$desc");

$q=  "UPDATE threads SET thread_title='$title' , thread_desc='$desc' WHERE thread_id='$id'";



if($conn->query($q) == TRUE)
	header("location:yourQ.php");

else
	echo $conn->error;

$conn->close();

?>