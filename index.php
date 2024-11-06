<?php
include 'db.php';

$result = $conn->query("SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Personas</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Gestión de Personas</h2>
    <a href="create.php" class="btn btn-primary mb-3">Agregar Persona</a>
    <div class="row">
        <?php while ($row = $result->fetch_assoc()) { 
            
            $imagen = $row['imagen'] ? $row['imagen'] : 'https://i.postimg.cc/fb0vxgY1/person-13334388.png';
        ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="<?php echo $imagen; ?>" class="card-img-top" alt="Imagen de <?php echo $row['nombre']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nombre'] . " " . $row['apellido']; ?></h5>
                        <div class="d-flex justify-content-between">
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar?');">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
