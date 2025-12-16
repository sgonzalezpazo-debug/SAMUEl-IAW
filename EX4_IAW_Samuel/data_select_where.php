<?php
include "autenticacion.php";
include "recoge.php";

$lastname = recoge('lastname');
if (!$lastname) {
    die("Debes indicar un apellido.");
}

$servername = "localhost";
$username = "sgp";
$password = "sgp";
$dbname = "bd_w3_sgp";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Consulta preparada para buscar por apellido
$stmt = $conn->prepare("SELECT id, firstname, lastname, email, codigo_usuario FROM MyGuests WHERE lastname = ?");
$stmt->bind_param("s", $lastname);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Código</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['firstname']}</td>
                <td>{$row['lastname']}</td>
                <td>{$row['email']}</td>
                <td>{$row['codigo_usuario']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados para el apellido '$lastname'.";
}

$stmt->close();
$conn->close();
?>


