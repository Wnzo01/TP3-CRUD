<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM usuarios WHERE id=$id");
$persona = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $imagen_url = $_POST['imagen_url'];

    
    if (empty($imagen_url)) {
        
        $imagen_url = 'https://i.postimg.cc/fb0vxgY1/person-13334388.png';
    }

    $conn->query("UPDATE usuarios SET nombre='$nombre', apellido='$apellido', imagen='$imagen_url' WHERE id=$id");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Persona</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Persona</h2>
    <form method="post">
        <div class="form-group">
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $persona['nombre']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Apellido:</label>
            <input type="text" name="apellido" value="<?php echo $persona['apellido']; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>URL de la Imagen (opcional):</label>
            <input type="text" name="imagen_url" value="<?php echo $persona['imagen']; ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </form>
</div>
</body>
</html>
