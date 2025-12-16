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

//Lanzamos la consulta
$sql = "SELECT id, firstname, lastname, email, telefono, codigo_usuario FROM MyGuests ORDER BY lastname";
$result = mysqli_query($conn, $sql);

if ($result==false) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
elseif (mysqli_num_rows($result) > 0) {

  // Convert result to an array so foreach can be used
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

  echo "<table border=1><tr><th>ID</th><th>Name</th></tr>";

  foreach ($rows as $row) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["lastname"]."</td><td>".$row["email"]."</td><td>".$row["telefono"]."</td><td>".$row["codigo_usuario"]."</td></tr>";
  }

  echo "</table>";

} else {
  echo "0 results";
}

// Close connection
mysqli_close($conn);
?>

