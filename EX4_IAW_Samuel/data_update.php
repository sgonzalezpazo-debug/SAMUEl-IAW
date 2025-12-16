<?php
include "autenticacion.php";
include "recoge.php";

// Recogemos y validamos los datos
$id = (int) recoge('id'); // fuerza a entero
$lastname = recoge('lastname');

if ($id <= 0 || !$lastname) {
    die("Debes indicar un ID válido y un nuevo apellido.");
}

// Datos de conexión
$servername = "localhost";
$username = "sgp";
$password = "sgp";
$dbname = "bd_w3_sgp";

// Conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Consulta preparada
$stmt = $conn->prepare("UPDATE MyGuests SET lastname = ? WHERE id = ?");
$stmt->bind_param("si", $lastname, $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "Apellido actualizado correctamente para el usuario con ID $id.";
    } else {
        echo "No se realizaron cambios. El ID puede no existir o el apellido ya era '$lastname'.";
    }
} else {
    echo "Error al actualizar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>



