<?php
    require_once 'PDOConnection.php';
    $pdo = new Connection('localhost','root', '');
    $conn = $pdo->getConnection('alumnos_asp');
    $stmt = $conn->prepare("SELECT * FROM alumnos");
    $stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>PHP CRUD</title>
</head>
<body>
    <div class="container">
        <h1>PHP Data Objects</h1>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Semestre</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = 1;
                while($row = $stmt->fetch()){
                    echo "<tr>";
                    echo "<td>$num</td>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo '<td><a href="update.php?nombre=' . $row[0] . '&semestre=' . $row[1] . '">Editar</a></td>';
                    echo '<td><a class="text-danger" href="delete.php?nombre=' . $row[0] . '&semestre=' . $row[1] . '">Delete</a></td>';
                    echo "</tr>";
                    $num++;
                }
                ?>
            </tbody>
        </table>
        <a href="add.php" class="btn btn-success">Agregar nuevo</a>
    </div>
</body>
</html>