<?php
    require_once 'PDOConnection.php';
    $pdo = new Connection('localhost','root', '');
    $conn = $pdo->getConnection('alumnos_asp');

    if (!empty($_GET)) {
        $nombre = $_GET['nombre'];
        $semestre = $_GET['semestre'];
        $sql = "DELETE FROM alumnos WHERE nombre='$nombre' and semestre='$semestre'";
        try{
            $conn->exec($sql);
            echo "Eliminacion exitosa";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Eliminar</title>
</head>
<body>
    <div class="container">
        <a href="index.php" class="btn btn-primary">Regresar</a>
    </div>
</body>
</html>