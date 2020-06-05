<?php 
    require_once 'PDOConnection.php';
    $pdo = new Connection('localhost','root', '');
    $conn = $pdo->getConnection('alumnos_asp');
    if (!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $semestre = $_POST['semestre'];

        $sql = "INSERT INTO alumnos VALUES (:nombre, :semestre)";
        $query = $conn->prepare($sql);
    
        $result = $query->execute([
            'nombre' => $nombre,
            'semestre' => $semestre
        ]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Agregar</title>
</head>
<body>
<div class="container">
    <h1>Agregar usuario</h1>
    <a href="index.php">Home</a>
    <?php
        /*if ($result) {
            echo '<div class="alert alert-success">Success!!!</div>';
        }*/
    ?>
    <form action="add.php" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="semestre">Semestre</label>
        <input type="text" name="semestre" id="semestre">
        <br>
        <input type="submit" value="Guardar" class="btn btn-success">
    </form>
</div>
</body>
</html>