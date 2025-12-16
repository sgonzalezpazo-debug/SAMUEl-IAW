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

// Prepare the multiple query
$sql = "INSERT INTO MyGuests (firstname, lastname, email, telefono, codigo_usuario)
VALUES ('John', 'Doe', 'john@example.com', '123456789', 'u12345');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email, telefono, codigo_usuario)
VALUES ('Mary', 'Moe', 'mary@example.com', '586247896', 'u54321');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email, telefono, codigo_usuario)
VALUES ('Julie', 'Dooley', 'julie@example.com', '965742586', 'u96587')";

if (mysqli_multi_query($conn, $sql)) {
  echo "New records created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?> 
