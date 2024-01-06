<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
</head>
<body>
    <h2>Recuperación de Contraseña</h2>
    <form action="recuperar_contraseña.php" method="post">
        <label for="password">Nueva Contraseña:</label>
        <input type="password" id="new-password" name="new-password" required>

        <label for="confirm-password">Confirmar Contraseña:</label>
        <input type="password" id="confirm-new-password" name="confirm-new-password" required>

        <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">

        <button type="submit">Guardar Contraseña</button>
    </form>
</body>
</html>