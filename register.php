<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$dbname = "mi_base_de_datos";
$dbusername = "tu_usuario";
$dbpassword = "tu_contraseña";

// Crear conexión
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$username = $_POST['username'];
$password = $_POST['password'];

// Encriptar la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insertar nuevo usuario en la base de datos
$sql = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username, $hashed_password);

if ($stmt->execute()) {
    echo "Usuario registrado exitosamente. <a href='index.html'>Iniciar sesión</a>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>