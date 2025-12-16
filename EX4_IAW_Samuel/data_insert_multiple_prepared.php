<?php
$servername = "localhost";
$username = "sgp";
$password = "sgp";
$dbname = "bd_w3_sgp";

include "autenticacion.php";

// Create connection (procedural)
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";
// Prepare statement con 5 placeholders 
$stmt = mysqli_prepare($conn, "INSERT INTO MyGuests (firstname, lastname, email, telefono, codigo_usuario) VALUES (?, ?, ?, ?, ?)");

// Bind parameters: 5 valores tipo string 
mysqli_stmt_bind_param($stmt, "sssss", $firstname, $lastname, $email, $telefono, $codigo_usuario);

// Set parameters and execute first record
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$telefono = "123456789";
$codigo_usuario = "u12345";
mysqli_stmt_execute($stmt);

// Second record
$firstname = "Mary";
$lastname = "Moe";
$email = "mary@example.com";
$telefono = "586247896";
$codigo_usuario = "u54321";
mysqli_stmt_execute($stmt);

// Third record
$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
$telefono = "965742586";
$codigo_usuario = "u96587";
mysqli_stmt_execute($stmt);

echo "New records created successfully";

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

