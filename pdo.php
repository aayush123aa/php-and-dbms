<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aayushbh";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


  $sql = "INSERT INTO babble (fname)
  VALUES ('aayushbha')";

  $conn->exec($sql);
  echo "Table MyGuests created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>