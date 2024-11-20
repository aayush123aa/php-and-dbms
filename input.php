<?php

$conn = mysqli_connect("localhost", "root", "", "aayush");



$fname = $_REQUEST['aayushfname'];
$lname = $_REQUEST['aayushlname'];
$roll = $_REQUEST['aayushroll'];

$sql= "INSERT INTO tbl_students(FirstName, LastName, ROll) 
VALUES ('$fname', '$lname', '$roll')";

if(mysqli_query($conn, $sql))
{
   echo "the data was successfully inputed into the database";
   echo  "\n$fname \n$lname \n$roll";


}


?>