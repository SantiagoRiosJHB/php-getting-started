<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Si el usuario no está autenticado, redirige a la página de inicio de sesión
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>Has iniciado sesión exitosamente.</p>
    <!-- Aquí puedes agregar más contenido y funcionalidades -->
</body>
</html>