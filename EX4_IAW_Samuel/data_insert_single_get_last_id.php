 <?php
$servername = "localhost";
$username = "sgp";
$password = "sgp";
$dbname = "bd_w3_sgp";

include "autenticacion.php";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

//Insert data in the table MyGuests
$sql = "INSERT INTO MyGuests (firstname, lastname, email, telefono, codigo_usuario)
VALUES ('John', 'Doe', 'john@example.com', '123456789', 'u12345')";

if (mysqli_query($conn, $sql)==false) {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  
} else {
 $last_id = mysqli_insert_id($conn);
  echo "New record created successfully. <br> Last inserted ID is: " . $last_id;
}

// Close connection
mysqli_close($conn);
?> 
