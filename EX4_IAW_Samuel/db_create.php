 <?php
include "autenticacion.php";

$servername = "localhost";
$username = "sgp";
$password = "sgp";
$dbname = "bd_w3_sgp";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully<br>";

// Create database
$sql = "CREATE DATABASE $dbname";
if (mysqli_query($conn, $sql)==false) {
   echo "Error creating database: " . mysqli_error($conn);
} else {
  echo "Database created successfully";
}

// Close connection
mysqli_close($conn);
?> 
