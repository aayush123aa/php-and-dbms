<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="bhandari"


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql="INSERT  INTO tabl(fname)
VALUES ('aayush')
";

$sql="INSERT  INTO tabl(fname)
VALUES ('aakahks')
";

$sql="INSERT  INTO tabl(fname)
VALUES ('higgs')
";


if (mysqli_query($conn, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

?>
<stdio class="h">
  
</stdio>







































































































































































































































































































































































































































































































































































































































