<?php
require('connect.php');
$student_id = $_GET['_id'];
$query = "DELETE FROM student WHERE id=$student_id"; 
$result = mysqli_query($conn,$query) or die ();
header("Location: adminhome.php"); 
?>