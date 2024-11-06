<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $imagen_url = $_POST['imagen_url'];

    
    if (empty($imagen_url)) {
        
        $imagen_url = 'https://i.postimg.cc/fb0vxgY1/person-13334388.png';
    }

    $sql = "INSERT INTO usuarios (nombre, apellido, imagen) VALUES ('$nombre', '$apellido', '$imagen_url')";
    $conn->query($sql);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Persona</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container mt-5">
    <h2>Agregar Persona</h2>
    <form method="post">
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Apellido:</label>
            <input type="text" name="apellido" class="form-control" required>
        </div>
        <div class="form-group">
            <label>URL de la Imagen (opcional):</label>
            <input type="text" name="imagen_url" class="form-control" placeholder="https://...">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </form>
</div>
</body>
</html>
