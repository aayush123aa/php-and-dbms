<?php

$conn = mysqli_connect("localhost", "root", "", "aayush");


$sql = "SELECT * FROM tbl_students";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    echo "Roll: " . $row["ROll"]. " - Name: " . $row["FirstName"]. " " . $row["LastName"]. "<br>";
    }
  }
  ?>